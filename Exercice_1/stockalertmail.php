<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Stockalertmail extends Module
{
    public function __construct()
    {
        $this->name = 'stockalertmail';
        $this->version = '1.0.0';
        $this->author = 'Anael Soler';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Stock Alert Mail');
        $this->description = $this->l('Envoyer un email à chaque modification du stock');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('actionProductUpdate');
    }

   public function hookActionProductUpdate($params)
{

# je viens récupérer les infos du produit (id, quantité, nom et langue)
    $idProduit = $params['id_product'];
    $quantite = $params['product']->quantity;
    $idLang = (int) Context::getContext()->language->id;
    $nomProduit = $params['product']->name[$idLang] ?? reset($params['product']->name);

    $templateVars = [
        '{product_name}' => $nomProduit,
        '{quantity}' => $quantite,
        '{product_id}' => $idProduit,
    ];

# j'envoie l'email avec mon adresse email (j'ai paramétré le serveur SMTP de prestashop pour utiliser mon adresse email pour le test)
    Mail::send(
        (int) Context::getContext()->language->id,
        'stockalert',
        'Alerte stock produit',
        $templateVars,
        'anaelsoler@gmail.com',
        null,
        null,
        null,
        null,
        null,
        _PS_MODULE_DIR_ . $this->name . '/mails/'
    );
}

    public function uninstall()
    {
        return parent::uninstall();
    }
}