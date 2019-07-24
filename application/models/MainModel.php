<?php 

   class MainModel extends CI_Model 
   {
      public function add_news($parameters)
      {
         $news_id             = $this->get_incremented_news_id();
         $news_title          = $parameters['news_title'];
         $news_description    = $parameters['news_description'];
         $news_image          = $parameters['news_image'];
         $posted_on           = time();

         $data = array(
            'id'             => $news_id,
            'title'          => $news_title,
            'description'    => $news_description,
            'image'          => $news_image,
            'posted_on'      => $posted_on
         );

         if ($this->db->insert('news', $data))
         {
            return true;
         }
         else
         {
            return false;
         }
      }

      public function get_incremented_news_id()
      {
         $query = $this->db->select('id')
                           ->from('news')
                           ->where(1)
                           ->order_by('id', 'desc')
                           ->limit(1);

         $action = $query->get();

         $result = $action->result_array();    
         
         if ($result == array())
         {
            return 1;
         }
         else
         {
            return 2;
         }
      }
   }

?>