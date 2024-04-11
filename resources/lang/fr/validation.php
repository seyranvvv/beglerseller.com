<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute dogry URL bolmalydyr.',
    'after' => ':attribute :date dan/den soňky sene bolmalydyr.',
    'after_or_equal' => ':attribute :date dan/den soňky ýa-da deň sene bolmalydyr.',
    'alpha' => ':attribute diňe harplardan durmalydyr.',
    'alpha_dash' => ':attribute diňe harplardan, sanlardan we tirelerden durmalydyr.',
    'alpha_num' => ':attribute diňe harplardan we sanlardan durmalydyr.',
    'array' => ':attribute ýygyndy bolmalydyr.',
    'before' => ':attribute :date dan/den öňki sene bolmalydyr.',
    'before_or_equal' => ':attribute :date dan/den öňki ýa-da deň sene bolmalydyr.',
    'between' => [
        'numeric' => ':attribute :min - :max arasynda bolmalydyr.',
        'file' => ':attribute :min - :max kilobaýt arasynda bolmalydyr.',
        'string' => ':attribute :min - :max harplar arasynda bolmalydyr.',
        'array' => ':attribute :min - :max arasynda madda eýe bolmalydyr.',
    ],
    'boolean' => ':attribute diňe dogry ýa-da ýalňyş bolmalydyr.',
    'confirmed' => ':attribute tassyklamasy deň däl.',
    'date' => ':attribute dogry sene bolmalydyr.',
    'date_equals' => ':attribute :date deň sene bolmalydyr.',
    'date_format' => ':attribute :format formatyna deň däl.',
    'different' => ':attribute bilen :other birbirinden tapawutly bolmalydyr.',
    'digits' => ':attribute :digits san bolmalydyr.',
    'digits_between' => ':attribute :min - :max arasynda san bolmalydyr.',
    'dimensions' => ':attribute surady dogry ölçeglerde bolmalydyr.',
    'distinct' => ':attribute gaýtadan ulanylmaly däl.',
    'email' => ':attribute dogry formatda e-poçta salgysy bolmalydyr.',
    'ends_with' => ':attribute şulardan biri bilen tamamlanmalydyr: :values',
    'exists' => 'saýlanan :attribute nädogry.',
    'file' => ':attribute faýl bolmalydyr.',
    'filled' => ':attribute meýdany zerur.',
    'gt' => [
        'numeric' => 'the :attribute must be greater than :value.',
        'file' => 'the :attribute must be greater than :value kilobytes.',
        'string' => 'the :attribute must be greater than :value characters.',
        'array' => 'the :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'the :attribute must be greater than or equal :value.',
        'file' => 'the :attribute must be greater than or equal :value kilobytes.',
        'string' => 'the :attribute must be greater than or equal :value characters.',
        'array' => 'the :attribute must have :value items or more.',
    ],
    'image' => ':attribute surat bolmalydyr.',
    'in' => 'saýlanan :attribute nädogry.',
    'in_array' => 'the :attribute field does not exist in :other.',
    'integer' => ':attribute san bolmalydyr.',
    'ip' => ':attribute dogry formatda IP salgysy bolmalydyr.',
    'ipv4' => ':attribute dogry formatda IPv4 salgysy bolmalydyr.',
    'ipv6' => ':attribute dogry formatda IPv6 salgysy bolmalydyr.',
    'json' => ':attribute dogry formatda JSON bolmalydyr.',
    'lt' => [
        'numeric' => 'the :attribute must be less than :value.',
        'file' => 'the :attribute must be less than :value kilobytes.',
        'string' => 'the :attribute must be less than :value characters.',
        'array' => 'the :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'the :attribute must be less than or equal :value.',
        'file' => 'the :attribute must be less than or equal :value kilobytes.',
        'string' => 'the :attribute must be less than or equal :value characters.',
        'array' => 'the :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute :max dan/den kiçi bolmalydyr.',
        'file' => ':attribute :max kilobaýtdan kiçi bolmalydyr.',
        'string' => ':attribute :max harpdan kiçi bolmalydyr.',
        'array' => ':attribute :max maddadan kiçi bolmalydyr.',
    ],
    'mimes' => ':attribute diňe :values formatlarynda bolmalydyr.',
    'mimetypes' => ':attribute diňe :values faýl formatlarynda bolmalydyr.',
    'min' => [
        'numeric' => ':attribute :min dan/den köp bolmalydyr.',
        'file' => ':attribute :min kilobaýtdan köp bolmalydyr.',
        'string' => ':attribute :min harpdan köp bolmalydyr.',
        'array' => ':attribute :min maddadan köp bolmalydyr.',
    ],
    'not_in' => 'saýlanan :attribute nädogry.',
    'not_regex' => ':attribute formaty nädogry.',
    'numeric' => ':attribute san bolmalydyr.',
    'password' => 'Açarsöz nädogry.',
    'present' => 'the :attribute field must be present.',
    'regex' => ':attribute formaty nädogry.',
    'required' => ':attribute meýdany zerur.',
    'required_if' => ':attribute meýdany, :other :value deň bolanda zerurdyr.',
    'required_unless' => 'the :attribute field is required unless :other is in :values.',
    'required_with' => ':attribute meýdany :values bar bolanda zerurdyr.',
    'required_with_all' => ':attribute meýdany haýsyda bolsa bir :values bar bolanda zerurdyr.',
    'required_without' => ':attribute meýdany :values ýok bolanda zerurdyr.',
    'required_without_all' => ':attribute meýdany :values dan haýsyda bolsa biri ýok bolanda zerurdyr.',
    'same' => ':attribute :other bilen deň bolmalydyr.',
    'size' => [
        'numeric' => ':attribute :size sandan ybarat bolmalydyr.',
        'file' => ':attribute :size kilobaýtdan ybarat bolmalydyr.',
        'string' => ':attribute :size harpdan ybarat bolmalydyr.',
        'array' => ':attribute :size maddadan ybarat bolmalydyr.',
    ],
    'starts_with' => ':attribute şulardan biri bilen başlamalydyr: :values',
    'string' => ':attribute harp/san bolmalydyr.',
    'timezone' => ':attribute dogry zolak bolmalydyr.',
    'unique' => ':attribute öňden hasaba alyndy.',
    'uploaded' => 'the :attribute failed to upload.',
    'url' => ':attribute formaty nädogry',
    'uuid' => ':attribute dogry UUID bolmalydyr.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        "nom d'utilisateur" => "NOM D'UTILISATEUR",
        'mot de passe' => 'MOT DE PASSE',
        'current_password' => 'ANCIEN MOT DE PASSE',
        'new_password' => 'NOUVEAU MOT DE PASSE',
        'new_password_confirm' => 'CONFIRMER LE NOUVEAU MOT DE PASSE',
        'parent-category' => 'TOP CATÉGORIE',
        'catégorie' => 'SECTION',
        'catégories' => 'SECTIONS',
        'nom' => 'NOM',
        'name_tm' => 'NOM',
        'name_ru' => 'NOM',
        'name_fr' => 'NOM',
        'product_name_tm' => 'NOM DU PRODUIT',
        'product_name_ru' => 'NOM DU PRODUIT',
        'product_name_fr' => 'NOM DU PRODUIT',
        'description' => 'DESCRIPTION',
        'description_tm' => 'DESCRIPTION',
        'description_ru' => 'DESCRIPTION',
        'description_fr' => 'DESCRIPTION',
        'image' => 'IMAGE',
        'image_tm' => 'IMAGE',
        'image_ru' => 'IMAGE',
        'image_fr' => 'IMAGE',
        'images' => 'IMAGES',
        'image_medium' => 'IMAGE DE TAILLE MOYENNE',
        'image_small' => 'PETITE IMAGE',
        'vidéo' => 'VIDÉO',
        'vidéos' => 'VIDÉOS',
        'titre' => 'TITRE',
        'title_tm' => 'TITRE',
        'title_ru' => 'TITRE',
        'title_fr' => 'TITRE',
        'corps' => 'CONTENU',
        'body_tm' => 'CONTENU',
        'body_ru' => 'CONTENU',
        'body_fr' => 'CONTENU',
        'datetime_start' => 'HEURE DE DÉBUT',
        'datetime_end' => 'HEURE DE FIN',
        'date_start' => 'DATE DE DÉBUT',
        'date_end' => 'DATE DE FIN',
        'statut' => 'STATUT',
        'type' => 'FORMULAIRE',
        'menu' => 'MENU',
        'maison' => 'MAISON',
        'pied de page' => 'MENU INFÉRIEUR',
        'sort_order' => 'ORDRE',
        'email' => 'EMAIL',
        'url' => 'TAX',
        'file' => 'FICHIER',
        'contact_type' => 'TYPE DE LETTRE',
        'question_tm' => 'QUESTION',
        'question' => 'QUESTION',
        'question_ru' => 'QUESTION',
        'question_fr' => 'QUESTION',
        'answer_tm' => 'RÉPONSE',
        'réponse' => 'RÉPONSE',
        'answer_ru' => 'RÉPONSE',
        'answer_fr' => 'RÉPONSE',
        'adresse' => 'TAX',
        'address_tm' => 'TAXE',
        'address_ru' => 'TAX',
        'address_fr' => 'TAX',
        'full_name' => 'Votre NOM COMPLET',
        'téléphone' => 'ID DE TÉLÉPHONE',
        'genre' => 'GENRE',
        'contact' => 'NUMÉRO DE TÉLÉPHONE OU EMAIL',
        'message' => 'Votre MAIL',
        'code' => 'CODE',
        'card_code' => 'CODE DE LA CARTE',
        'prix' => 'PRIX',
        'pourcentage' => 'JE VAIS',
        'date_available' => 'DATE DE DÉBUT DE LA VENTE',
        'discount_date_start' => 'DATE DE DÉBUT DE LA REMISE',
        'discount_date_end' => 'DATE DE FIN DE LA REMISE',
        'discount_percent' => 'Pourcentage de remise',
        'quantité' => 'QUANTITÉ',
        'option' => 'SPÉCIFICATION',
        'options' => 'OPTIONS',
        "valeur" => "VALEUR",
        'valeurs' => 'VALEURS',
        'emplacement' => 'EMPLACEMENT',
        'recherche' => 'RECHERCHE',
        "shipping_fee" => "FRAIS D'EXPÉDITION",
        'min_order_fee' => 'FRAIS MINIMUM DE COMMANDE',
    ],
];
