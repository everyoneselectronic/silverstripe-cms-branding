<?php

class CMSBrandingSiteConfigExtension extends DataExtension {

    private static $db = array(
        "CustomApplicationName" => "Varchar",
        "CustomApplicationLink" => "Varchar(255)",
        "ShowReportAdmin" => "Boolean",
        "ShowHelpLink" => "Boolean"
    );

    private static $has_one = array(
        "CustomCMSLogo" => "Image",
        "CustomCMSLoading" => "Image"
    );

    private static $has_many = array(
    );

    private static $defaults = array(
        "ShowReportAdmin" => true,
        "ShowHelpLink" => true
    );


    public function updateCMSFields(FieldList $fields) {

            $fields->addFieldToTab("Root.CMS Branding", HeaderField::create("CMSBrandingHeader", "CMS Branding Options"));

            $fields->addFieldToTab("Root.CMS Branding",  TextField::create("CustomApplicationName", "Application Name"));
            $fields->addFieldToTab("Root.CMS Branding",  TextField::create("CustomApplicationLink", "Application Link"));

            $fields->addFieldToTab("Root.CMS Branding",  $iconField = new UploadField("CustomCMSLogo", "CMS Logo<br>(dimensions: 22 x 22)"));
            $iconField->setAllowedExtensions(array("jpg", "jpeg", "png", "gif"));
            $iconField->setFolderName("cmsbranding");

            $fields->addFieldToTab("Root.CMS Branding",  $loadingField = new UploadField("CustomCMSLoading", "CMS Loading Image<br>(dimensions: 470 x 300)"));
            $loadingField->setAllowedExtensions(array("jpg", "jpeg", "png", "gif"));
            $loadingField->setFolderName("cmsbranding");

            $fields->addFieldToTab("Root.CMS Branding",  CheckboxField::create("ShowReportAdmin", "Show Report in Admin?"));
            $fields->addFieldToTab("Root.CMS Branding",  CheckboxField::create("ShowHelpLink", "Show Help in Admin?"));
    }

}
