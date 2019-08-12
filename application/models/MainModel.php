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
                           ->limit(1)
                           ->order_by('id', 'desc');

         $action = $query->get('news');
         
         $result = $action->result_array();    
         
         if ($result == array())
         {
            return 1;
         }
         else
         {
            return $result[0]['id'] + 1;
         }
      }

      public function get_total_news()
      {
         return $this->db->count_all("news");
      }

      public function get_news_for_particular_page($per_page, $page)
      {
         $query = $this->db->limit($per_page, $page)
                           ->order_by('posted_on' , 'desc');
                           
         $action = $query->get("news");
 
         if ($action->num_rows() > 0) 
         {
             foreach ($action->result_array() as $row) 
             {
                 $data[] = $row;
             }
             return $data;
         }
         return false;
      }

      public function delete_news($news_id)
      {
         $this->db->where('id', $news_id);
         if ($this->db->delete('news') == true)
         {
            return true;
         }
         else
         {
            return false;
         }
      }

      public function get_total_contact_messages()
      {
         return $this->db->count_all("contact_messages");
      }

      public function get_contact_messages_for_particular_page($per_page, $page)
      {
         $query = $this->db->limit($per_page, $page)
                           ->order_by('created_at' , 'desc');
                           
         $action = $query->get("contact_messages");
 
         if ($action->num_rows() > 0) 
         {
             foreach ($action->result_array() as $row) 
             {
                 $data[] = $row;
             }
             return $data;
         }
         return false;
      }

      public function add_message($parameters)
      {
         $news_id             = $this->get_incremented_message_id();
         $message          = $parameters['message'];
         $time           = time();

         $data = array(
            'id'             => $news_id,
            'message'          => $message,
            'time'      => $time
         );

         if ($this->db->insert('messages_from_mr_kaura', $data))
         {
            return true;
         }
         else
         {
            return false;
         }
      }

      public function get_incremented_message_id()
      {
         $query = $this->db->select('id')
                           ->limit(1)
                           ->order_by('id', 'desc');

         $action = $query->get('messages_from_mr_kaura');
         
         $result = $action->result_array();    
         
         if ($result == array())
         {
            return 1;
         }
         else
         {
            return $result[0]['id'] + 1;
         }
      }
   }
?>