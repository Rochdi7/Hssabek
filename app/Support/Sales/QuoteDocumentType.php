<?php

namespace App\Support\Sales;

use InvalidArgumentException;

class QuoteDocumentType
{
    private const TYPES = [
        'quote' => [
            'type' => 'quote',
            'label' => 'Devis',
            'plural_label' => 'Devis',
            'lower_label' => 'devis',
            'lower_plural_label' => 'devis',
            'definite_label' => 'le devis',
            'number_label' => 'N° Devis',
            'new_label' => 'Nouveau devis',
            'create_title' => 'Nouveau devis',
            'details_title' => 'Détails du devis',
            'edit_title' => 'Modifier le devis',
            'count_label' => 'Total devis',
            'all_label' => 'Tous les devis',
            'accepted_label' => 'Devis acceptés',
            'sent_label' => 'Devis envoyés',
            'expired_label' => 'Devis expirés',
            'search_placeholder' => 'Rechercher un devis...',
            'delete_confirmation' => 'Êtes-vous sûr de vouloir supprimer ce devis ?',
            'status_modal_title' => 'Changer le statut du devis',
            'create_success' => 'Devis créé avec succès.',
            'update_success' => 'Devis mis à jour avec succès.',
            'delete_success' => 'Devis supprimé avec succès.',
            'send_success' => 'Devis envoyé au client par email.',
            'status_success' => 'Statut du devis mis à jour avec succès.',
            'convert_success' => 'Devis converti en facture avec succès.',
            'reference_placeholder' => 'Ex: DEV-00001',
            'route_base' => 'bo.sales.quotes',
            'export_type' => 'quotes',
            'public_slug' => 'devis',
            'filename_prefix' => 'devis',
            'email_subject_prefix' => 'Devis',
            'pdf_title' => 'Devis',
        ],
        'attachment' => [
            'type' => 'attachment',
            'label' => 'Attachement',
            'plural_label' => 'Attachements',
            'lower_label' => 'attachement',
            'lower_plural_label' => 'attachements',
            'definite_label' => 'l\'attachement',
            'number_label' => 'N° Attachement',
            'new_label' => 'Nouvel attachement',
            'create_title' => 'Nouvel attachement',
            'details_title' => 'Détails de l\'attachement',
            'edit_title' => 'Modifier l\'attachement',
            'count_label' => 'Total attachements',
            'all_label' => 'Tous les attachements',
            'accepted_label' => 'Attachements acceptés',
            'sent_label' => 'Attachements envoyés',
            'expired_label' => 'Attachements expirés',
            'search_placeholder' => 'Rechercher un attachement...',
            'delete_confirmation' => 'Êtes-vous sûr de vouloir supprimer cet attachement ?',
            'status_modal_title' => 'Changer le statut de l\'attachement',
            'create_success' => 'Attachement créé avec succès.',
            'update_success' => 'Attachement mis à jour avec succès.',
            'delete_success' => 'Attachement supprimé avec succès.',
            'send_success' => 'Attachement envoyé au client par email.',
            'status_success' => 'Statut de l\'attachement mis à jour avec succès.',
            'convert_success' => 'Attachement converti en facture avec succès.',
            'reference_placeholder' => 'Ex: ATT-00001',
            'route_base' => 'bo.sales.attachments',
            'export_type' => 'attachments',
            'public_slug' => 'attachement',
            'filename_prefix' => 'attachement',
            'email_subject_prefix' => 'Attachement',
            'pdf_title' => 'Attachement',
        ],
        'situation' => [
            'type' => 'situation',
            'label' => 'Situation',
            'plural_label' => 'Situations',
            'lower_label' => 'situation',
            'lower_plural_label' => 'situations',
            'definite_label' => 'la situation',
            'number_label' => 'N° Situation',
            'new_label' => 'Nouvelle situation',
            'create_title' => 'Nouvelle situation',
            'details_title' => 'Détails de la situation',
            'edit_title' => 'Modifier la situation',
            'count_label' => 'Total situations',
            'all_label' => 'Toutes les situations',
            'accepted_label' => 'Situations acceptées',
            'sent_label' => 'Situations envoyées',
            'expired_label' => 'Situations expirées',
            'search_placeholder' => 'Rechercher une situation...',
            'delete_confirmation' => 'Êtes-vous sûr de vouloir supprimer cette situation ?',
            'status_modal_title' => 'Changer le statut de la situation',
            'create_success' => 'Situation créée avec succès.',
            'update_success' => 'Situation mise à jour avec succès.',
            'delete_success' => 'Situation supprimée avec succès.',
            'send_success' => 'Situation envoyée au client par email.',
            'status_success' => 'Statut de la situation mis à jour avec succès.',
            'convert_success' => 'Situation convertie en facture avec succès.',
            'reference_placeholder' => 'Ex: SIT-00001',
            'route_base' => 'bo.sales.situations',
            'export_type' => 'situations',
            'public_slug' => 'situation',
            'filename_prefix' => 'situation',
            'email_subject_prefix' => 'Situation',
            'pdf_title' => 'Situation',
        ],
        'recap' => [
            'type' => 'recap',
            'label' => 'Récap',
            'plural_label' => 'Récaps',
            'lower_label' => 'récap',
            'lower_plural_label' => 'récaps',
            'definite_label' => 'le récap',
            'number_label' => 'N° Récap',
            'new_label' => 'Nouveau récap',
            'create_title' => 'Nouveau récap',
            'details_title' => 'Détails du récap',
            'edit_title' => 'Modifier le récap',
            'count_label' => 'Total récaps',
            'all_label' => 'Tous les récaps',
            'accepted_label' => 'Récaps acceptés',
            'sent_label' => 'Récaps envoyés',
            'expired_label' => 'Récaps expirés',
            'search_placeholder' => 'Rechercher un récap...',
            'delete_confirmation' => 'Êtes-vous sûr de vouloir supprimer ce récap ?',
            'status_modal_title' => 'Changer le statut du récap',
            'create_success' => 'Récap créé avec succès.',
            'update_success' => 'Récap mis à jour avec succès.',
            'delete_success' => 'Récap supprimé avec succès.',
            'send_success' => 'Récap envoyé au client par email.',
            'status_success' => 'Statut du récap mis à jour avec succès.',
            'convert_success' => 'Récap converti en facture avec succès.',
            'reference_placeholder' => 'Ex: REC-00001',
            'route_base' => 'bo.sales.recaps',
            'export_type' => 'recaps',
            'public_slug' => 'recap',
            'filename_prefix' => 'recap',
            'email_subject_prefix' => 'Récap',
            'pdf_title' => 'Récap',
        ],
    ];

    public static function all(): array
    {
        return self::TYPES;
    }

    public static function resolve(?string $type): array
    {
        return self::TYPES[$type ?? 'quote'] ?? self::TYPES['quote'];
    }

    public static function fromPublicSlug(string $slug): array
    {
        foreach (self::TYPES as $config) {
            if ($config['public_slug'] === $slug) {
                return $config;
            }
        }

        throw new InvalidArgumentException("Unsupported quote document slug [{$slug}].");
    }

    public static function publicSlugPattern(): string
    {
        return implode('|', array_map(
            static fn (array $config) => preg_quote($config['public_slug'], '/'),
            array_values(self::TYPES)
        ));
    }
}
