<?php
Class panier
 {
     private $DB;
    public function __construct($DB)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!isset($_SESSION['panier'])
        )
        {
            $_SESSION['panier']= array();
        }
        
        $this->DB=$DB;

        if(isset($_POST['panier']['quantity']))
        {
                $this->recalc();     
       }

    }
    public function add($product_id)
    {
        if(isset($_SESSION['panier'][$product_id]))
        {
           $_SESSION['panier'][$product_id] ++ ;

        }else
        {
            $_SESSION['panier'][$product_id]= 1;
        }   
        
    }
  
            public function recalc()
            {
                foreach($_SESSION['panier'] as $product_id => $quantity)
                {
                    if(isset($_POST['panier']['quantity'][$product_id]))
                    {
                        $_SESSION['panier'][$product_id]= $_POST['panier']['quantity'][$product_id];
                    }
                }
            }


    public function total()
    {
        $total= 0;
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids))
        {
          $products=array();

        }else
        {
         $products = $this->DB->queery('SELECT * FROM produit WHERE product_id IN ('.implode(',',$ids).') ');
        }
        foreach( $products as $product)
        {
            if ($product->prix_promotion == 0)
            {
                $x=$product->product_price;

            }
                else
                {
                    $x=$product->prix_promotion;
                }

                $total += $x * $_SESSION['panier'][$product->product_id] ;

        }
            return $total;
    }

    public function totalprix()
    {
        $ids = array_keys($_SESSION['panier']);
         $products = $this->DB->queery('SELECT * FROM produit WHERE product_id IN ('.implode(',',$ids).') ');
        foreach( $products as $product)
        {
    if($product->prix_promotion==0)
    {$rs=number_format($product->product_price,3,',','');}
    else
    {$rs=number_format($product->prix_promotion,3,',','');  }
    return $rs;
 }
    }
    public function count()
    {
        return array_sum($_SESSION['panier']);
    }
    
    public function del($product_id)
    {
        unset($_SESSION['panier'][$product_id]);
     }

}