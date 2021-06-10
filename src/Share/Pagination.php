<?php
namespace App\Share;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * Class Pagination 
 * @description permet de paginer une liste de valeurs qui lui est transmise avec un certain nombre
 * de paramètres
 * 
 * @params : -@values tableau des valeurs : Array()
 *           -@per_group nb de pages par groupe : integer
 *           -@per page nb elements par page : integer
 *           -@current page de la page courante :integer
 * 
 * @methodes :
 *           privees :
 *              __create_link
 *              __
 *           publiques:
 *                paginate
 */
 
 class Pagination
 {
	public function __construct(ArrayCollection $values,string $url,int $per_group = 5,int $per_page = 20, int $current_page = 1)
	{
			$this->values = $values;
			$this->url = $url;
			$this->per_group = $per_group;
			$this->per_page = $per_page;
		    $this->current_page = $current_page;
	}
	 
	private function __create_link($page,$value,$item='')
	{
		switch($item)
		{
		    case 'disabled':
				$link="href='#'";
				$class="disabled";
				$id="disabled-".(string) $page;
				break;
				
			case 'active':
			    $link="href='#'";
			    $class="active";
			    $id="lien-page-active";
			    break;
			    
			case 'first':
			case 'last':
			case 'plus-one':
			case 'less-one':
			    $link="href='/page/{$this->url}/{$page}'";
			    $class="";
			    $id=$item; 
			    break; 
			default:
			    $link="href='/page/{$this->url}/{$page}'";
			    $class="";
			    $id="lien-page-".(string) $page;
			    break;
		}
		
		return "<li id='li-{$id}' class='page-item {$class}'><a id='{$id}' class='page-link' data-page='{$page}' {$link}>{$value}</a></li>";
		
	}
	
	public function paginate() 
	{
		$total_values=$this->values->count();
		$nb_pages = (int) ceil($total_values / $this->per_page);
		$last_group = (int) floor($nb_pages / $this->per_group);
		/**
		 * Recuperation des indices de debut et de fin pour afficher 
		 * le contenu de la page
		 */
		 $start_indice=($this->current_page-1)*$this->per_page;
		 $content=array_slice($this->values->toArray(),$start_indice,$this->per_page);
		 /**
		  * Creation des liens de pages 
		  * 1 item -> first absent si on est sur premier groupe
		  * 2 item -> lessone absent si on est sur premier groupe
		  * 3 pages of the group
		  * 4 item -> plusone absent si on est sur dernier groupe
		  * 5 item -> last absent si on est sur dernier groupe
		  **/
		  
		  /**
		   * <<on definit quel est le groupe dans lequel se trouve la page
		   **/
		   
		   $current_group = (int) floor($this->current_page/$this->per_group);
		   
		   /**
		    * Creation de la fin de liste
		    */
		    if( $current_group == $last_group )
		    {
				$footer_link="</ul>";
			}
			else
			{
				$footer_link=$this->__create_link((($current_group+1)*$this->per_group)+1,'&#9654;',"plus-one")
				             .$this->__create_link($nb_pages,'&#9654;&#9654;',"last")
				             ."</ul>";
				
			}
			/**
			 *  Creation du debut de liste
			 */
			 $header_link="<ul class='liste-pages pagination'>";
			 if( $current_group != 0)
			 {
				 $header_link.=$this->__create_link(1,'&#9664;&#9664;',"first");
				 $header_link.=$this->__create_link((($current_group-1)*$this->per_group+1),'&#9664;',"less-one");
			 }
			 
			 /**
			  * Creation des liens de pages à partir du current_group
			  * */
			  $first_indice_group=($current_group*$this->per_group)+1;
			  /* nb_pages represente la derniere page a être remplie si une page est superieure à cet id
			   * alors le bouton est dans l'etat disabled 
			   * si la page courante est egale à l'id de la page, alors la page est active */

			  $links="";
			  
			  for($i=$first_indice_group;$i < $first_indice_group+$this->per_group;$i++){
				  if( $this->current_page == $i)
				  {
					 $links.=$this->__create_link($i,$i,'active');
				  }
				  else if ( $i > $nb_pages)
				  {
					 $links.=$this->__create_link($i,$i,'disabled');
				  }
				  else
				  {
					 $links.=$this->__create_link($i,$i,'');
				  }
			   }
			return array("pagination"=>$header_link.$links.$footer_link,
			             "content"=>$content,
			             "total"=>$total_values); 
	}
	 
 }



?>
