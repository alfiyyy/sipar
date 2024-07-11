<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_model extends CI_Model {

	public $vars;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * get headline posts
	 * 
	 * @param    $limit      string
	 * @param    $order_by   string
	 * @return   array  
	 * 
	 */
	public function get_headline($limit = '5', $order_by = 'post_id,DESC')
	{
		$query = $this->db->select('
									t_post.id         AS post_id,
									t_post.title      AS post_title,
									t_post.seotitle   AS post_seotitle,
									t_post.content    AS post_content,
									t_post.picture,
									t_post.datepost,
									t_post.timepost,
									t_category.id     AS category_id,
									t_category.title  AS category_title
									');
		$query = $this->db->join('t_category', 't_category.id = t_post.id_category', 'LEFT');
		$query = $this->db->where('t_post.active', 'Y');
		$query = $this->db->where('t_post.headline', 'Y');

		$exLimit = explode(',', $limit);

		if ( count($exLimit) > 1 )
		{
			$query = $this->db->limit((int)$exLimit[0], (int)$exLimit[1]);
		}
		else
		{
			$query = $this->db->limit($limit);
		}

		if ( $order_by != 'RAND()' )
		{
			$xo = explode(',', $order_by);
			$query = $this->db->order_by($xo[0], $xo[1]);
		}
		else
		{
			$query = $this->db->order_by($order_by);
		}
		
		$query = $this->db->get('t_post');
		$result = $query->result_array();

		return $result;
	}

	public function get_banner($limit = '5', $order_by = 'unker_id,DESC')
	{
		$query = $this->db->select('
									t_unit_kerja.unker_id         AS unker_id,
									t_unit_kerja.unker_nama      AS unker,
									t_unit_kerja.unker_image   AS banner
									');

		$exLimit = explode(',', $limit);

		if ( count($exLimit) > 1 )
		{
			$query = $this->db->limit((int)$exLimit[0], (int)$exLimit[1]);
		}
		else
		{
			$query = $this->db->limit($limit);
		}

		if ( $order_by != 'RAND()' )
		{
			$xo = explode(',', $order_by);
			$query = $this->db->order_by($xo[0], $xo[1]);
		}
		else
		{
			$query = $this->db->order_by($order_by);
		}
		
		$query = $this->db->get('t_unit_kerja');
		$result = $query->result_array();

		return $result;
	}


	public function popular_post($interval = NULL, $limit = '5', $order_by='post_hits,DESC')
	{
		$query = $this->db->select('
					 t_post.id            AS  post_id,
					 t_post.title         AS  post_title,
					 t_post.seotitle      AS  post_seotitle,
					 t_post.active        AS  post_active,
					 t_post.content       AS  post_content,
					 t_post.picture       AS  post_picture,
			         t_post.datepost      AS  post_datepost,
			         t_post.timepost      AS  post_timepost,
			         t_post.tag           AS  post_tag,
			         t_post.hits          AS  post_hits,

					 t_category.id        AS  category_id,
					 t_category.title     AS  category_title,
					 t_category.seotitle  AS  category_seotitle,

					 t_user.id            AS  user_id,
					 t_user.name          AS  user_name,
					');
		$query = $this->db->join('t_category', 't_category.id = t_post.id_category', 'left');
		$query = $this->db->join('t_user', 't_user.id = t_post.id_user', 'left');
		$query = $this->db->where('t_post.active', 'Y');

		if ($interval === 'week')
		{
			$query = $this->db->where('date(t_post.datepost) > DATE_SUB(NOW(), INTERVAL 1 WEEK)', NULL, FALSE);
		} 

		if ($interval === 'month')
		{
			$query = $this->db->where('MONTH(t_post.datepost)', date('m'));
		}

		if ($interval === 'year')
		{
			$query = $this->db->where('YEAR(t_post.datepost)', date('Y'));
		}

		$exLimit = explode(',', $limit);
		
		if ( count($exLimit) > 1 )
		{
			$query = $this->db->limit((int)$exLimit[0], (int)$exLimit[1]);
		}
		else
		{
			$query = $this->db->limit($limit);
		}

		if ( $order_by != 'RAND()' )
		{
			$xo = explode(',', $order_by);
			$query = $this->db->order_by($xo[0], $xo[1]);
		}
		else
		{
			$query = $this->db->order_by($order_by);
		}

		$query = $this->db->get('t_post');
		$result = $query->result_array();

		return $result;
	}


	public function latest_post($limit = '5', $order_by = 'post_id,DESC')
	{
		$query = $this->db->select('
					 t_post.id            AS  post_id,
					 t_post.title         AS  post_title,
					 t_post.seotitle      AS  post_seotitle,
					 t_post.active        AS  post_active,
					 t_post.content       AS  post_content,
					 t_post.picture       AS  post_picture,
			         t_post.datepost      AS  post_datepost,
			         t_post.timepost      AS  post_timepost,
			         t_post.tag           AS  post_tag,
			         t_post.hits          AS  post_hits,

					 t_category.id        AS  category_id,
					 t_category.title     AS  category_title,
					 t_category.seotitle  AS  category_seotitle,
					 
					 t_user.id            AS  user_id,
					 t_user.name          AS  user_name,
					');
		$query = $this->db->join('t_category', 't_category.id = t_post.id_category', 'left');
		$query = $this->db->join('t_user', 't_user.id = t_post.id_user', 'left');
		$query = $this->db->where('t_post.active', 'Y');

		if ( $order_by != 'RAND()' )
		{
			$xo = explode(',', $order_by);
			$query = $this->db->order_by($xo[0], $xo[1]);
		}
		else
		{
			$query = $this->db->order_by($order_by);
		}

		$exLimit = explode(',', $limit);
		
		if ( count($exLimit) > 1 )
		{
			$query = $this->db->limit((int)$exLimit[0], (int)$exLimit[1]);
		}
		else
		{
			$query = $this->db->limit($limit);
		}
		
		$query = $this->db->get('t_post');
		$result = $query->result_array();

		return $result;
	}


	public function index_post($batas, $posisi)
	{
		$query = $this->db
			->select('
					 t_post.id            AS  post_id,
					 t_post.title         AS  post_title,
					 t_post.seotitle      AS  post_seotitle,
					 t_post.active        AS  post_active,
					 t_post.content,
					 t_post.picture,
			         t_post.datepost, 
			         t_post.timepost,
			         t_post.tag,
			         t_post.hits,
					 t_category.id        AS  category_id,
					 t_category.title     AS  category_title,
					 t_category.seotitle  AS  category_seotitle,
					 t_user.id            AS  user_id,
					 t_user.name          AS  user_name,
					')
			->join('t_category', 't_category.id = t_post.id_category', 'left')
			->join('t_user', 't_user.id = t_post.id_user', 'left')
			->where('t_post.active', 'Y')
			->order_by('t_post.datepost','DESC')
			->order_by('t_post.timepost','DESC')
			->limit($batas, $posisi)
			->get('t_post');

		return $query->result_array();
	}


	public function total_post()
	{
		$query = $this->db->select('id');
		$query = $this->db->where('active', 'Y');
		$query = $this->db->get('t_post');
		return $query->num_rows();
	}


	public function get_post_lmit_by_category($id_category = '', array $limit)
	{
		$query = $this->db
			->select('
			         t_post.title         AS  post_title,
			         t_post.seotitle      AS  post_seotitle,
			         t_post.picture,
			         t_post.datepost,
			         t_post.timepost,
			         t_post.content,
			         t_category.id        AS  category_id,
			         t_category.title     AS  category_title,
			         t_category.seotitle  AS  category_seotitle
			         ')
			->from('t_post')
			->join('t_category', 't_category.id=t_post.id_category', 'LEFT')
			->where('t_post.active', 'Y')
			->where('t_post.id_category', $id_category)
			->or_where('t_category.id_parent', $id_category)
			->order_by('t_post.id','DESC');

		if ( count($limit) == 1 )
		{
			$query = $this->db->limit($limit[0]);
		}
		else 
		{
			$query = $this->db->limit($limit[0], $limit[1]);
		}

		$result = $this->db->get();
		return $result;
	}


	public function get_category_by($col = 'id', $val = '1', $param = 'row')
	{
		$query = $this->db->where($col, $val);
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->get('t_category');

		if ( $param == 'result' )
		{
			$result = $query->result_array();
		}
		
		if ( $param == 'row' )
		{
			$result = $query->row_array();
		}

		return $result;
	}

	// menampilkan kertersediaan ruangan
	public function get_post_lmit_by_unker($id_category = '', array $limit)
	{
		$query = $this->db
			->select('
			         t_room_kategori.kategori_nama         AS  kategori_nama,
			         t_room_kategori.kategori_id      	AS  kategori_id,
			         t_room_kategori.kategori_image,
			         t_room_kategori.created_at,
			         t_unit_kerja.unker_id        AS  unker_id,
			         t_unit_kerja.unker_nama     AS  nama,
			         t_unit_kerja.unker_deskripsi  AS  deskripsi
			         ')
			->from('t_room_kategori')
			->join('t_unit_kerja', 't_room_kategori.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', $id_category)
			->order_by('t_room_kategori.kategori_id','DESC');

		if ( count($limit) == 1 )
		{
			$query = $this->db->limit($limit[0]);
		}
		else 
		{
			$query = $this->db->limit($limit[0], $limit[1]);
		}

		$query = $this->db->get();
		return $query;
	}

	public function get_post_by_unker()
	{
		$query = $this->db
			->select('
                t_room_kategori.kategori_nama         AS  kategori_nama,
                t_room_kategori.kategori_id      	AS  kategori_id,
                t_room_kategori.kategori_image,
                t_room_kategori.created_at
            ')
			->from('t_room_kategori')
			->order_by('t_room_kategori.kategori_id','DESC');

		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_unker_by($col = 'id', $val = '1', $param = 'row')
	{
		if ( $param == 'result' )
		{
            		$query = $this->db->order_by('unker_id', 'ASC');
            		$query = $this->db->get('t_unit_kerja');

			$result = $query->result_array();
		}
		
		if ( $param == 'row' )
		{
            		$query = $this->db->where($col, $val);
            		$query = $this->db->order_by('unker_id', 'ASC');
            		$query = $this->db->get('t_unit_kerja');

			$result = $query->row_array();
		}

		return $result;
	}

	public function get_comments($limit=4)
	{
		$query = $this->db
			->where('active','Y')
			->order_by('id','DESC')
			->get('t_comment')
			->result_array();
		return $query;
	}

    public function get_data_detail($id_category) 
    {
        $query = $this->db
			->select('
                t_room_kategori.kategori_id      	AS  kategori_id,
                t_unit_kerja.unker_id        AS  unker_id,
                t_unit_kerja.unker_nama     AS  nama,
				t_unit_kerja.unker_telp AS telephone,
				t_unit_kerja.unker_email AS email,
                t_unit_kerja.unker_alamat AS alamat,
                t_room_kategori.kategori_nama         AS  kategori_nama,
                t_room_kategori.kategori_deskripsi AS deskripsi,
                t_room_kategori.created_at
            ')
			->from('t_room_kategori')
			->join('t_unit_kerja', 't_room_kategori.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_room_kategori.kategori_id', $id_category)
			->order_by('t_room_kategori.kategori_id','DESC');

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_data_fasilitas($id_category)
    {
        $query = $this->db
                    ->select('rf_nama, rf_icon')
                    ->from('t_room_fasilitas')
                    ->where('kategori_id', $id_category)
                    ->order_by('kategori_id','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_data_layanan($id_category)
    {
        $query = $this->db
                    ->select('rl_nama, rl_harga')
                    ->from('t_room_layanan')
                    ->where('kategori_id', $id_category)
                    ->order_by('kategori_id','DESC');
        $query = $this->db->get();
        return $query;
    }

	public function get_data_gambar_room($id_category)
	{
		$query = $this->db
				->select('rg_image')
				->from('t_room_gambar')
				->where('kategori_id', $id_category)
				->order_by('kategori_id','DESC');
		$query = $this->db->get();
		return $query;
	}
} // End class.