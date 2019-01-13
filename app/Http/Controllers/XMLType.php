<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import the interface above
interface FileCreationContract
{
    public function create($content);
}

   class XMLType implements OutputType
    {
        protected $xml;
        
        protected $parentElement;
        protected $elementGroup;
        
        
        protected $parentList = [];
        protected $elementList = [];

        public function __construct()
        {
            $this->xml= new \DOMDocument('1.0', 'ISO-8859-15');
        }

        public function createParent($type, $attributes = [])
        {
            $this->parentElement = $this->xml->createElement($type);
            $this->addAttributes($this->parentElement, $attributes);
            
            return $this;
        }

        private function addAttributes(&$element, $attributes)
        {
            if (sizeof($attributes) > 0) {
                foreach($attributes as $type => $value) {
                    $element->setAttribute($type, $value);
                }
            }
        }

        public function addElement($type, $element, $attributes = [])
        {
             $this->elementGroup  = $this->xml->createElement($type, $element);
             $this->addAttributes($this->elementGroup, $attributes);
             $this->elementList[] = $this->elementGroup;
             return $this;
        }

        /**
         *  We wish to trigger this every time you want to ad d a new parent to
         *  hold new elements! So the program knows to close
         *  the previous one before starting a new and mesh all into one single
         *  element, which we do not want to!
        **/
        public function groupParentAndElements()
        {
            foreach($this->elementList as $prevElements) {
                $this->parentElement->appendChild($prevElements);
            }
            
            $this->parentList[] = $this->parentElement;
            $this->elementList = [];
            
            return $this;
        }

        public function generate()
        {
            //Uses filled parentList where each parent contains its child elements to generate the XML
            foreach ($this->parentList as $prevParent) {
                $this->xml->appendChild($prevParent);    
            }
            
            //here I am saving and printing but you can change to suit your needs.
            //It is at this point it is ready to generate the XML
            
            
			return $this->xml->saveXML();
              
        }


    }

