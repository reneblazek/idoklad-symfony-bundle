# idoklad-symfony-bundle

## Symfony Bundle

A symfony bundle for IDoklad api v3

Installation
------------

### Step 1: Download MufinIDokladBundle using composer

Require the `mufin/idoklad-symfony-bundle` with composer [Composer](http://getcomposer.org/).

```bash
$ composer require mufin/idoklad-symfony-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

```php
<?php

// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Mufin\IDokladBundle\MufinIDokladBundle(),
        // ...
    );
}
```

### Step 3: Configure the MufinIDokladBundle

Below is a minimal example of the configuration necessary to use the
`MufinIDokladBundle` in your application:

```yml
# .env

###> mufin/idoklad-symfony-bundle ###
IDOKLAD_CLIENT_ID="client_id_from_idoklad_website"
IDOKLAD_CLIENT_SECRET="client_secret_from_idoklad_website"
###< mufin/idoklad-symfony-bundle ###
```

### Step 4: Usage of MufinIDokladBundle

# New Invoice

create contact for invoice

```php
$createContactRequest = new ContactRequest();
$response = $IDokladClient->sendRequest($createContactRequest);
```

create invoice

```php
$createInvoiceRequest = new NewInvoiceRequestModel();
$response = $IDokladClient->sendRequest($createInvoiceRequest);
```

invoice detail

```php
$issuedInvoice = new IssuedInvoiceRequestModel('invoice_id', ReportLanguage::SK(), false);
$response = $IDokladClient->sendRequest($issuedInvoice);
```