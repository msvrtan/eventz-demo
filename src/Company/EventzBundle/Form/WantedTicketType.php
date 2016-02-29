<?php
namespace Company\EventzBundle\Form;

use Company\EventzBundle\Entity\Event;
use Company\EventzBundle\Entity\TicketType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WantedTicketType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ticketsNeeded', ChoiceType::class, ['choices' => $this->ticketsNeededChoices()])
            ->add('maximumPricePerTicket')
            ->add('maximumPricePerTicketCurrency', ChoiceType::class, ['choices' => $this->currencyChoices()])
            ->add('notificationEmail');

        $formMod = function (FormInterface $form, Event $event = null, TicketType $ticketType = null) {

            $ticketTypes = [];
            if ($event) {
                $ticketTypes = $event->getTicketTypes();
            }
            $form->add(
                'ticketType',
                'entity',
                [
                    'class'       => 'CompanyEventzBundle:TicketType',
                    'placeholder' => '',
                    'choices'     => $ticketTypes,
                    'required'    => true,
                ]
            );
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formMod) {
                $formMod($event->getForm(), $event->getData()->getEvent(), $event->getData()->getTicketType());
            }
        );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'Company\EventzBundle\Entity\WantedTicket',
            ]
        );
    }

    private function ticketsNeededChoices()
    {
        return [
            1 => '1 tickets',
            2 => '2 tickets',
            3 => '3 tickets',
        ];
    }

    private function currencyChoices()
    {
        return [
            'EUR' => 'EUR',
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'form';
    }
}
