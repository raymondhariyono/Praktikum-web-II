<?php

declare (strict_types=1);
namespace Rector\Symfony\Symfony62\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Type\ObjectType;
use Rector\Php80\NodeAnalyzer\PhpAttributeAnalyzer;
use Rector\Rector\AbstractRector;
use Rector\Symfony\Helper\MessengerHelper;
use Rector\Symfony\NodeManipulator\ClassManipulator;
use Rector\Symfony\ValueObject\ServiceDefinition;
use Rector\ValueObject\PhpVersionFeature;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Rector\Symfony\Tests\Symfony62\Rector\Class_\MessageHandlerInterfaceToAttributeRector\MessageHandlerToAttributeRectorTest
 */
final class MessageHandlerInterfaceToAttributeRector extends AbstractRector implements MinPhpVersionInterface
{
    /**
     * @readonly
     */
    private MessengerHelper $messengerHelper;
    /**
     * @readonly
     */
    private ClassManipulator $classManipulator;
    /**
     * @readonly
     */
    private PhpAttributeAnalyzer $phpAttributeAnalyzer;
    /**
     * @readonly
     */
    private ReflectionProvider $reflectionProvider;
    public function __construct(MessengerHelper $messengerHelper, ClassManipulator $classManipulator, PhpAttributeAnalyzer $phpAttributeAnalyzer, ReflectionProvider $reflectionProvider)
    {
        $this->messengerHelper = $messengerHelper;
        $this->classManipulator = $classManipulator;
        $this->phpAttributeAnalyzer = $phpAttributeAnalyzer;
        $this->reflectionProvider = $reflectionProvider;
    }
    public function provideMinPhpVersion() : int
    {
        return PhpVersionFeature::ATTRIBUTES;
    }
    public function getRuleDefinition() : RuleDefinition
    {
        return new RuleDefinition('Replaces MessageHandlerInterface with AsMessageHandler attribute', [new CodeSample(<<<'CODE_SAMPLE'
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SmsNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(SmsNotification $message)
    {
        // ... do some work - like sending an SMS message!
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    public function __invoke(SmsNotification $message)
    {
        // ... do some work - like sending an SMS message!
    }
}
CODE_SAMPLE
)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [Class_::class];
    }
    /**
     * @param Class_ $node
     */
    public function refactor(Node $node) : ?Node
    {
        if (!$this->reflectionProvider->hasClass(MessengerHelper::AS_MESSAGE_HANDLER_ATTRIBUTE)) {
            return null;
        }
        if ($this->phpAttributeAnalyzer->hasPhpAttribute($node, MessengerHelper::AS_MESSAGE_HANDLER_ATTRIBUTE)) {
            return null;
        }
        $classType = $this->getType($node);
        $messageHandlerObjectType = new ObjectType(MessengerHelper::MESSAGE_HANDLER_INTERFACE);
        if (!$messageHandlerObjectType->isSuperTypeOf($classType)->yes()) {
            $handlers = $this->messengerHelper->getHandlersFromServices();
            if ($handlers === []) {
                return null;
            }
            return $this->checkForServices($node, $handlers);
        }
        $this->classManipulator->removeImplements($node, [MessengerHelper::MESSAGE_HANDLER_INTERFACE]);
        // no need to add the attribute
        if ($node->isAbstract()) {
            return $node;
        }
        return $this->messengerHelper->addAttribute($node);
    }
    /**
     * @param ServiceDefinition[] $handlers
     */
    private function checkForServices(Class_ $class, array $handlers) : ?Class_
    {
        $hasChanged = \false;
        foreach ($handlers as $handler) {
            if ($this->isName($class, $handler->getClass() ?? $handler->getId())) {
                $options = $this->messengerHelper->extractOptionsFromServiceDefinition($handler);
                if (!isset($options['method']) || $options['method'] === '__invoke') {
                    $this->messengerHelper->addAttribute($class, $options);
                    $hasChanged = \true;
                }
            }
        }
        if ($hasChanged) {
            return $class;
        }
        return null;
    }
}
