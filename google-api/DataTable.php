<?php 
	require('Database.php');
	class DataTable
	{
		public $js=array();
		public $css=array();
		public $JStableName;
		public $JStableIdentifier;
		public $JSParams=array();
		public $columnHeaders;
		public $columnFooters;
		public $JSDefaults=array();
		public $extJS=array();
		public $columns=array();
		public $externalJS=array();
		public $columnAttributes=array();
		public $dbConnect;
		public $instance;
		public $globalCustomSearch=array('ind_id','ind_name','grp_id','grp_name','trn_id','trn_name','org_id','org_name','lvg_id','lvg_name');


		/**
		 * The DataTable object is created with either tableIdentifier or tablName or both or none
		 * @param [type] $tableIdentifier [It is CSS class or ID selector; Default: #table-list]
		 * @param [type] $tableName       [It is name of object of DataTable generated for Javascript]
		 */
		function __construct($tableIdentifier=null, $tableName=null)
		{
			
			//$qry=$this->instance->query("SELECT * FROm wi_individual_g WHERE ind_district_id LIKE '%?%' LIMIT 10",array(72));
			//$row=$qry->result_array();
			//print_r($row);
			//print_r($db);
			if($tableName!=null)
			{
				$this->JStableName=$tableName;
			}
			else
			{
				$this->JStableName='oTable';
			}
			if($tableIdentifier!=null)
			{
				$this->JStableIdentifier=$tableIdentifier;
			}
			else
			{
				$this->JStableIdentifier='#table-list';
			}
		}

		/**
		 * [isAssoc description]
		 * @param  [type]  $arr [description]
		 * @return boolean      [description]
		 */
		function isAssoc($arr)
		{
		    return array_keys($arr) !== range(0, count($arr) - 1);
		}

		/**
		 * [JSParams description]
		 * @param [type] $params [description]
		 */
		function JSParams($params=null)
		{
			if($params!=null)
			{
				if(is_array($params))
				{
					foreach ($params as $key => $value) {
						$this->JSParams[$key]=$value;
					}
				}
			}
		}

		/**
		 * [selectAllRows description]
		 * @param  boolean $bool    [description]
		 * @param  [type]  $swfPath [description]
		 * @return [type]           [description]
		 */
		function selectAllRows($bool=false,$swfPath=null)
		{
			if($bool==true){
				//$this->JSParams(array('dom'=>'T<"clear">lfrtip'),array('tableTools'=>array("sSwfPath"=> "media/sswf/copy_csv_xls_pdf.swf","sRowSelect"=>"multi","aButtons"=> array("select_all", "select_none" ))));
				$this->JSParams['dom']='T<"clear">lfrtip';
				if($swfPath!=null)
				{
					$this->JSParams['tableTools']=array('sSwfPath'=>$swfPath,"sRowSelect"=>"multi","aButtons"=> array("select_all", "select_none","xls" ));
					//$this->JSParams['tableTools']=array('sSwfPath'=>$swfPath,"sRowSelect"=>"multi","aButtons"=> array("select_all"=>array("sExtends"=>"select_all","fnClick"=>"function () {var record_count = oTable.fnSettings().fnGetSelectedData();alert(record_count);")));					
				}
				else
				{
					$this->JSParams['tableTools']=array('sSwfPath'=>"http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf");
					//$this->JSParams['tableTools']=array('sSwfPath'=>"media/swf/copy_csv_xls_pdf.swf","sRowSelect"=>"multi","aButtons"=> array("select_all"=>array("sExtends"=>"select_all","fnClick"=>"function () {var record_count = oTable.fnSettings().fnGetSelectedData();alert(record_count);")));	
				}
				//$ext="var oTT = TableTools.fnGetInstance( '".str_replace('#','',str_replace('.','',$this->JStableIdentifier))."' );var aData = oTT.fnGetSelectedData()";
				//$this->extJS[]=$ext;
			}
		}

		function setExport($bool=false,$columns,$swfPath=null)
		{
			$keys=array();
			$totalColumns=count($columns)-1;
			foreach($columns as $key=>$value)
			{
				if($key<$totalColumns)
				{
					if($value['visible']==true)
					{
						$keys[]=$key;
					}
				}					
			}
			//$keys='[ '.implode(',',$keys).' ]';
			//print_r($keys);exit;
			if($bool==true){
				//$this->JSParams(array('dom'=>'T<"clear">lfrtip'),array('tableTools'=>array("sSwfPath"=> "media/sswf/copy_csv_xls_pdf.swf","sRowSelect"=>"multi","aButtons"=> array("select_all", "select_none" ))));
				$this->JSParams['dom']='T<"clear">lfrtip';
				if($swfPath!=null)
				{
					$this->JSParams['tableTools']=array('sSwfPath'=>$swfPath,"sRowSelect"=>"multi","aButtons"=> array("select_all", "select_none","xls" ));
					//$this->JSParams['tableTools']=array('sSwfPath'=>$swfPath,"sRowSelect"=>"multi","aButtons"=> array("select_all"=>array("sExtends"=>"select_all","fnClick"=>"function () {var record_count = oTable.fnSettings().fnGetSelectedData();alert(record_count);")));					
				}
				else
				{
					$this->JSParams['tableTools']=array(
						'sSwfPath'=>URL."public/swf/copy_csv_xls_pdf.swf"/*"http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"*/,
						"aButtons"=> array(
							array("sExtends"=> "xls",
								"sButtonText"=>"Export to Excel",
								"mColumns"=>$keys/*,"fnCellRender"=> "function ( sValue, iColumn, nTr,iDataIndex ) {
						
						return \"+sValue+\";}"*/)/*,'copy'*/));
					//$this->JSParams['tableTools']=array('sSwfPath'=>"media/swf/copy_csv_xls_pdf.swf","sRowSelect"=>"multi","aButtons"=> array("select_all"=>array("sExtends"=>"select_all","fnClick"=>"function () {var record_count = oTable.fnSettings().fnGetSelectedData();alert(record_count);")));	
				}
				//$ext="var oTT = TableTools.fnGetInstance( '".str_replace('#','',str_replace('.','',$this->JStableIdentifier))."' );var aData = oTT.fnGetSelectedData()";
				//$this->extJS[]=$ext;
			}
		}

		/**
		 * [setPaging description]
		 * @param boolean $bool [description]
		 */
		function setPaging($bool=true)
		{
			$this->JSParams['paging']=$bool;
		}

		/**
		 * [setLengthMenu description]
		 * @param [type] $menuLength [description]
		 */
		function setLengthMenu($menuLength=null)
		{
			if($menuLength!=null)
			{
				if(is_array($menuLength))
				{
					$this->JSParams['lengthMenu']=$menuLength;
				}
			}
		}

		/**
		 * [setDefered description]
		 * @param boolean $bool [description]
		 */
		function setDefered($bool=false)
		{
			$this->JSParams['deferRender']=$bool;
		}

		/**
		 * [setAjax description]
		 * @param [type] $ajax [description]
		 * @param [type] $type [description]
		 * @param [type] $size [description]
		 */
		function setAjax($ajax=null,$type=null,$pagesCache=null)
		{
			if($ajax!=null)
			{
				$this->JSParams['processing']=true;
				$this->JSParams['serverSide']=true;
				if($type!=null)
				{
					if($pagesCache!=null)
					{
						$this->setPipeline(true);
						$this->JSParams['ajax']=array('url'=>$ajax,"type"=>$type);
					}
					else
					{
						$this->JSParams['ajax']=array('url'=>$ajax,"type"=>$type);
					}
				}
				else
				{
					if($pagesCache!=null)
					{
						$this->setPipeline(true);
						$this->JSParams['ajax']=array('url'=>$ajax,"type"=>"POST");
						
						
					}
					else
					{
						$this->JSParams['ajax']=array('url'=>$ajax,"type"=>"POST");
					}
				}
				
			}
		}

		/**
		 * [setOrder description]
		 * @param boolean $bool [description]
		 */
		function setOrder($bool=true)
		{
			$order[]=array();
			if(is_bool($bool))
			{
				$this->JSParams['ordering']=$bool;
			}
			else
			{
				if(is_array($bool))
				{
					$this->JSParams['order']=$bool;
				}
			}			
		}

		/**
		 * [setDefaults description]
		 * @param [type] $params [description]
		 */
		function setDefaults($params=null)
		{
			if($params!=null)
			{
				if(is_array($params))
				{
					foreach ($params as $key => $value) {
						$this->JSDefaults[$key]=$value;
					}
				}
			}
		}

		/**
		 * [setRowColumn description]
		 * @param [type] $colIndex [description]
		 */
		function setRowColumn($colIndex=null)
		{
			$param='';
			//$param=array();
			if($colIndex!=null)
			{
				$param .= ''
					.'function(row,data,index) {'."\n"
						.' if(data['.$colIndex.'].replace(/[\$,]/g, \'\') * 1 > 4000 ) {'."\n"
						.'		$("td", row).eq('.$colIndex.').html("<a href=#>"+data['.$colIndex.']+"</a>");'."\n"
						.' }'."\n"
						.'}';
			}

			$this->JSParams['createdRow']=$param;

		}

		/**
		 * [putDefaults description]
		 * @return [type] [description]
		 */
		function putDefaults()
		{
			$js='';
			if(count($this->JSDefaults)>0)
			{
				$js = '$.extend( $.fn.dataTable.defaults, '."\n"
					.(!empty($this->JSDefaults) ? json_encode((object) $this->JSDefaults) : '')."\n"
				.');';
			}
			return $js;
		}

		/**
		 * [domPosition description]
		 * @param  [type] $top    [description]
		 * @param  [type] $bottom [description]
		 * @return [type]         [description]
		 */
		function domPosition($top=null,$bottom=null)
		{
			$position='';
			if($top==null)
			{
				$position .='<"top"iflp<"clear">>';
			}
			else
			{
				$position .=$top;
			}
			$position .='rt';
			if($bottom==null)
			{
				$position .='<"bottom"iflp<"clear">>';
			}
			else
			{
				$position .=$bottom;
			}
			$this->JSParams['dom']=$position;
		}


		/**
		 * [saveState description]
		 * @param  boolean $bool [description]
		 * @return [type]        [description]
		 */
		function saveState($bool=true)
		{
			$this->JSParams['stateSave']=$bool;
		}

		function setPaginationControls($param)
		{
			$this->JSParams['pagingType']=$param; //simple, simple_numbers, full, full_numbers
		}

		function setScroll($horizontal=null,$vertical=null)
		{
			if($horizontal!=null)
			{
				$this->JSParams['scrollX']=$horizontal;
			}
			if($vertical!=null)
			{
				if(is_array($vertical))
				{
					foreach ($vertical as $key => $value) {
						$this->JSParams[$key]=$value;
					}
				}
			}
		}

		/**
		 * [setMultiFilters description]
		 * @param boolean $bool [description]
		 * @param [type]  $dom  [description]
		 */
		function setMultiFilters($bool=false,$dom=null)
		{
			$keys=array();
			$countInvisible=0;
			$invStatus=0;
			$vKey=0;
			foreach ($this->columns as $key=>$column)
			{
				if($column['visible']=="1")
				{
					$invStatus=0;
					$vKey=$key-$countInvisible;
					if((isset($column['searchable']) && $column['searchable']=="1") || !isset($column['searchable']))
					{
						$keys[]=$vKey;					
					}
				}
				else
				{
					$invStatus=1;
					$countInvisible++;
				}
			}
			$search=json_encode($keys);

			if($bool==true)
			{
				//echo $t;
				//$ext="$('".$this->JStableIdentifier."').append('".$this->columnFooters."');";
				if($dom==null || $dom=="text")
				{
					$ext="$('".$this->JStableIdentifier." tfoot th').each( function (i) {
								var search=".$search.";
								var t=$.inArray(i,search);
								if(t>-1)
								{
									
									var t=$('".$this->JStableIdentifier." tfoot th').length-1;
									var title = $('".$this->JStableIdentifier." thead th').eq( $(this).index() ).text();
								    $(this).html( '<input type=\"text\" placeholder=\"Search '+title+'\" />' );
								}
									
							        
						    });";
					$ext .= $this->JStableName.".columns().eq( 0 ).each( function ( colIdx ) {
					        $( 'input', ".$this->JStableName.".column( colIdx ).footer() ).on( 'keypress', function (e) {
					        	var keycode = (event.keyCode ? event.keyCode : event.which);
						        if(keycode == '13'){
						            ".$this->JStableName."
					                .column( colIdx )
					                .search( this.value )
					                .draw();
						        }
					            
					        } );
					    } );";
					$this->extJS[]=$ext;
				}
				elseif($dom=="select")
				{
					$colFooter='';
					$colFooter= "\nfunction () {
									var api = this.api();
									api.columns().indexes().flatten().each( function ( i ) {
										var column = api.column( i );
										var select = $('<select><option value=\"\"></option></select>')
											.appendTo( $(column.footer()).empty() )
											.on( 'change', function () {
												var val = $(this).val();
												column
													.search( val ? val : '', true, false )
													.draw();
											} );

										column.data().unique().sort().each( function ( d, j ) {
											select.append( '<option value=\"'+d+'\">'+d+'</option>' )
										} );
									} );
								}";
					$this->JSParams["initComplete"]=$colFooter;
				}				
			}
		}

		/**
		 * [selectRows description]
		 * @param  boolean $bool [description]
		 * @return [type]        [description]
		 */
		function selectRows($bool=false)
		{
			if($bool==true)
			{
				$colFooter='';
				$colFooter= "function( row, data ) {
					            if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
					                $(row).addClass('selected');
					            }
					        }";
					//$colFooter="function ( row, data, start, end, display ) {var api = this.api(), data;var intVal = function ( i ) {return typeof i === 'string' ?i.replace(/[\\$,]/g, ')*1 :typeof i === 'number' ?i : 0;};total = api.column( ".$colIndex." ).data().reduce( function (a, b) {return intVal(a) + intVal(b);} );pageTotal = api.column( ".$colIndex.", { page: 'current'} ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );$( api.column( ".$colIndex." ).footer() ).html('$'+pageTotal +' ( $'+ total +' total)');}";
				$ext="var selected = [];$('".$this->JStableIdentifier." tbody').on('click', 'tr', function () {
				        var id = this.id;
				        var index = $.inArray(id, selected);
				 
				        if ( index === -1 ) {
				            selected.push( id );
				        } else {
				            selected.splice( index, 1 );
				        }
				 
				        $(this).toggleClass('selected');
				    } );";
				$this->extJS[]=$ext;
				$this->JSParams["rowCallback"]=$colFooter;
			}
		}


		/**
		 * [setLanguage description]
		 * @param [type] $lang [description]
		 */
		function setLanguage($lang=null)
		{
			if($lang!=null)
			{
				$this->JSParams['language']=$lang;
			}
		}

		/**
		 * [setInfo description]
		 * @param boolean $bool [description]
		 */
		function setInfo($bool=true)
		{
			$this->JSParams['info']=$bool;
		}

		/**
		 * [setPage description]
		 * @param [type] $size [description]
		 */
		function setPage($size=null,$pageType=null)
		{
			if($size==null)
			{
				$this->JSParams['pageLength']=10;
			}
			else
			{
				$this->JSParams['pageLength']=$size;
				
			}
			if($pageType!=null)
			{
				$this->setPaginationControls($pageType);
			}			
		}

		/**
		 * [setPipeline description]
		 * @param boolean $bool [description]
		 */
		
		function setPagingGroup($bool=false,$showPages=10,$next=false){
			$this->JSParams['showPages']=$showPages;
			$this->JSParams["pagingNumbersGrouping"]=$bool;
			$this->JSParams["pagingExtraNumberForNext"]=$next;
			$ext='$.extend($.fn.dataTableExt.oStdClasses, {
			    \'sPageEllipsis\': \'paginate_ellipsis\',
			    \'sPageNumber\': \'paginate_number\',
			    \'sPageNumbers\': \'paginate_numbers\',
			    \'sPageFirst\': "first",           // These are 
			    \'sPagePrevious\': "previous",     // necessary for
			    \'sPageNext\': "next",             // newer versions
			    \'sPageLast\': "last"              // of DataTables (>= 1.10)
			});

			$.fn.dataTableExt.oPagination.ellipses = {
			    \'oDefaults\': {
			        \'showPages\': 5,
			        \'pagingNumbersGrouping\': false,
			        \'pagingExtraNumberForNext\': false
			    },
			    \'fnClickHandler\': function (e) {
			        var fnCallbackDraw = e.data.fnCallbackDraw,
			            oSettings = e.data.oSettings,
			            sPage = e.data.sPage;

			        if ($(this).is(\'[disabled]\')) {
			            return false;
			        }

			        oSettings.oApi._fnPageChange(oSettings, sPage);
			        fnCallbackDraw(oSettings);

			        return true;
			    },
			    // fnInit is called once for each instance of pager
			    \'fnInit\': function (oSettings, nPager, fnCallbackDraw) {
			        var oClasses = oSettings.oClasses,
			            oLang = oSettings.oLanguage.oPaginate,
			            that = this;

			        var showPages = oSettings.oInit.showPages || this.oDefaults.showPages,
			            showPagesHalf = Math.floor(showPages / 2),
			            pagingNumbersGrouping = oSettings.oInit.pagingNumbersGrouping || this.oDefaults.pagingNumbersGrouping,
			            pagingExtraNumberForNext = oSettings.oInit.pagingExtraNumberForNext || this.oDefaults.pagingExtraNumberForNext;

			        $.extend(oSettings, {
			            _showPages: showPages,
			            _showPagesHalf: showPagesHalf,
			            _pagingNumbersGrouping: pagingNumbersGrouping,
			            _pagingExtraNumberForNext: pagingExtraNumberForNext
			        });

			        var oFirst = $(\'<a class="\' + oClasses.sPageButton + \' \' + oClasses.sPageFirst + \'">\' + oLang.sFirst + \'</a>\'),
			            oPrevious = $(\'<a class="\' + oClasses.sPageButton + \' \' + oClasses.sPagePrevious + \'">\' + oLang.sPrevious + \'</a>\'),
			            oNumbers = $(\'<span class="\' + oClasses.sPageNumbers + \'"></span>\'),
			            oNext = $(\'<a class="\' + oClasses.sPageButton + \' \' + oClasses.sPageNext + \'">\' + oLang.sNext + \'</a>\'),
			            oLast = $(\'<a class="\' + oClasses.sPageButton + \' \' + oClasses.sPageLast + \'">\' + oLang.sLast + \'</a>\');

			        oFirst.click({ \'fnCallbackDraw\': fnCallbackDraw, \'oSettings\': oSettings, \'sPage\': \'first\' }, that.fnClickHandler);
			        oPrevious.click({ \'fnCallbackDraw\': fnCallbackDraw, \'oSettings\': oSettings, \'sPage\': \'previous\' }, that.fnClickHandler);
			        oNext.click({ \'fnCallbackDraw\': fnCallbackDraw, \'oSettings\': oSettings, \'sPage\': \'next\' }, that.fnClickHandler);
			        oLast.click({ \'fnCallbackDraw\': fnCallbackDraw, \'oSettings\': oSettings, \'sPage\': \'last\' }, that.fnClickHandler);

			        // Draw
			        $(nPager).append(oFirst, oPrevious, oNumbers, oNext, oLast);
			    },
			    // fnUpdate is only called once while table is rendered
			    \'fnUpdate\': function (oSettings, fnCallbackDraw) {
			        var oClasses = oSettings.oClasses,
			            that = this;

			        var tableWrapper = oSettings.nTableWrapper;

			        // Update stateful properties
			        this.fnUpdateState(oSettings);

			        if (oSettings._iCurrentPage === 1) {
			            $(\'.\' + oClasses.sPageFirst, tableWrapper).attr(\'disabled\', true);
			            $(\'.\' + oClasses.sPagePrevious, tableWrapper).attr(\'disabled\', true);
			        } else {
			            $(\'.\' + oClasses.sPageFirst, tableWrapper).removeAttr(\'disabled\');
			            $(\'.\' + oClasses.sPagePrevious, tableWrapper).removeAttr(\'disabled\');
			        }

			        if (oSettings._iTotalPages === 0 || oSettings._iCurrentPage === oSettings._iTotalPages) {
			            $(\'.\' + oClasses.sPageNext, tableWrapper).attr(\'disabled\', true);
			            $(\'.\' + oClasses.sPageLast, tableWrapper).attr(\'disabled\', true);
			        } else {
			            $(\'.\' + oClasses.sPageNext, tableWrapper).removeAttr(\'disabled\');
			            $(\'.\' + oClasses.sPageLast, tableWrapper).removeAttr(\'disabled\');
			        }

			        var i, oNumber, oNumbers = $(\'.\' + oClasses.sPageNumbers, tableWrapper);

			        // Erase
			        oNumbers.html(\'\');

			        for (i = oSettings._iFirstPage; i <= oSettings._iLastPage; i++) {
			            oNumber = $(\'<a class="\' + oClasses.sPageButton + \' \' + oClasses.sPageNumber + \'">\' + oSettings.fnFormatNumber(i) + \'</a>\');

			            if (oSettings._iCurrentPage === i) {
			                oNumber.attr(\'active\', true).attr(\'disabled\', true);
			            } else {
			                oNumber.click({ \'fnCallbackDraw\': fnCallbackDraw, \'oSettings\': oSettings, \'sPage\': i - 1 }, that.fnClickHandler);
			            }

			            // Draw
			            oNumbers.append(oNumber);
			        }

			        // Add ellipses
			        if (1 < oSettings._iFirstPage) {
			            oNumbers.prepend(\'<span class="\' + oClasses.sPageEllipsis + \'">...</span>\');
			        }

			        if (oSettings._iLastPage < oSettings._iTotalPages) {
			            oNumbers.append(\'<span class="\' + oClasses.sPageEllipsis + \'">...</span>\');
			        }
			    },
			    // fnUpdateState used to be part of fnUpdate
			    // The reason for moving is so we can access current state info before fnUpdate is called
			    \'fnUpdateState\': function (oSettings) {
			        var iCurrentPage = Math.ceil((oSettings._iDisplayStart + 1) / oSettings._iDisplayLength),
			            iTotalPages = Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
			            iFirstPage,
			            iLastPage;

			        // Added, calculating pagingNumbersGrouping
			        if (oSettings._pagingNumbersGrouping) {
			            var pageSet = Math.ceil(iCurrentPage / oSettings._showPages);
			            iLastPage = pageSet * oSettings._showPages;
			            iFirstPage = iLastPage - (oSettings._showPages - 1);
			            if (oSettings._pagingExtraNumberForNext) {
			                iLastPage++;
			            }
			        } else {
			            iFirstPage = iCurrentPage - oSettings._showPagesHalf;
			            iLastPage = iCurrentPage + oSettings._showPagesHalf;
			        }

			        if (iTotalPages < oSettings._showPages) {
			            iFirstPage = 1;
			            iLastPage = iTotalPages;
			        } else if (iFirstPage < 1) {
			            iFirstPage = 1;
			            iLastPage = oSettings._showPages;
			        } else if (iLastPage > iTotalPages) {
			            if (!oSettings._pagingNumbersGrouping) {
			                iFirstPage = (iTotalPages - oSettings._showPages) + 1;
			            }
			            iLastPage = iTotalPages;
			        }

			        $.extend(oSettings, {
			            _iCurrentPage: iCurrentPage,
			            _iTotalPages: iTotalPages,
			            _iFirstPage: iFirstPage,
			            _iLastPage: iLastPage
			        });
			    }
			};';
			$this->externalJS[]=$ext;
		}
		function setPipeline($bool=false)
		{
			$ext='$.fn.dataTable.pipeline = function ( opts ) {
			    // Configuration options
			    var conf = $.extend( {
			        pages: 5,     // number of pages to cache
			        url: \'\',      // script url
			        data: null,   // function or object with parameters to send to the server
			                      // matching how `ajax.data` works in DataTables
			        method: \'GET\' // Ajax HTTP method
			    }, opts );
			 
			    // Private variables for storing the cache
			    var cacheLower = -1;
			    var cacheUpper = null;
			    var cacheLastRequest = null;
			    var cacheLastJson = null;
			 
			    return function ( request, drawCallback, settings ) {
			        var ajax          = false;
			        var requestStart  = request.start;
			        var drawStart     = request.start;
			        var requestLength = request.length;
			        var requestEnd    = requestStart + requestLength;
			         
			        if ( settings.clearCache ) {
			            // API requested that the cache be cleared
			            ajax = true;
			            settings.clearCache = false;
			        }
			        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
			            // outside cached data - need to make a request
			            ajax = true;
			        }
			        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
			                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
			                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
			        ) {
			            // properties changed (ordering, columns, searching)
			            ajax = true;
			        }
			         
			        // Store the request for checking next time around
			        cacheLastRequest = $.extend( true, {}, request );
			 
			        if ( ajax ) {
			            // Need data from the server
			            if ( requestStart < cacheLower ) {
			                requestStart = requestStart - (requestLength*(conf.pages-1));
			 
			                if ( requestStart < 0 ) {
			                    requestStart = 0;
			                }
			            }
			             
			            cacheLower = requestStart;
			            cacheUpper = requestStart + (requestLength * conf.pages);
			 
			            request.start = requestStart;
			            request.length = requestLength*conf.pages;
			 
			            // Provide the same `data` options as DataTables.
			            if ( $.isFunction ( conf.data ) ) {
			                // As a function it is executed with the data object as an arg
			                // for manipulation. If an object is returned, it is used as the
			                // data object to submit
			                var d = conf.data( request );
			                if ( d ) {
			                    $.extend( request, d );
			                }
			            }
			            else if ( $.isPlainObject( conf.data ) ) {
			                // As an object, the data given extends the default
			                $.extend( request, conf.data );
			            }
			 
			            settings.jqXHR = $.ajax( {
			                "type":     conf.method,
			                "url":      conf.url,
			                "data":     request,
			                "dataType": "json",
			                "cache":    false,
			                "success":  function ( json ) {
			                    cacheLastJson = $.extend(true, {}, json);
			 
			                    if ( cacheLower != drawStart ) {
			                        json.data.splice( 0, drawStart-cacheLower );
			                    }
			                    json.data.splice( requestLength, json.data.length );
			                     
			                    drawCallback( json );
			                }
			            } );
			        }
			        else {
			            json = $.extend( true, {}, cacheLastJson );
			            json.draw = request.draw; // Update the echo for each response
			            json.data.splice( 0, requestStart-cacheLower );
			            json.data.splice( requestLength, json.data.length );
			 
			            drawCallback(json);
			        }
			    }
			};
			 
			// Register an API method that will empty the pipelined data, forcing an Ajax
			// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
			$.fn.dataTable.Api.register( \'clearPipeline()\', function () {
			    return this.iterator( \'table\', function ( settings ) {
			        settings.clearCache = true;
			    } );
			} );';
			$this->externalJS[]=$ext;
		}

		/**
		 * [JsonFunction description]
		 * @param array $param [description]
		 */
		function JsonFunction($param=array())
		{
			foreach($param as $key => &$value){
				if(!is_array($value))
				{
					if(strpos($value, 'function(')===0 || strpos($value, 'function (')===0){
					    $this->value_arr[] = $value;
					    $value = '%' . $key . '%';
					    $this->replace_keys[] = '"' . $value . '"';
					}
				}
				else
				{
					$this->JsonFunction($value);
				}
			}		
		}

		/**
		 * 
		 */
		function json_func_expr($json)
		{
		    $clearFunction= preg_replace_callback(
		        //'/(?<=:)"function\((?:(?!}").)*}"/', //no space
		        '/(?<=:)"function *\((?:(?!}").)*}"/', //for more space
		        //'/(?<=:)"function[ ]\((?:(?!}").)*}"/', //for one space
		        //'json_strip_escape',
		        array($this,'json_strip_escape'),
		        $json
		    );
		    return $clearFurtherFunction=preg_replace_callback(
		        //'/(?<=:)"function\((?:(?!}").)*}"/', //no space
		        '/(?<=:)"\$\.fn(?:(?!}").)*\)"/', //for more space
		        //'/(?<=:)"function[ ]\((?:(?!}").)*}"/', //for one space
		        //'json_strip_escape',
		        array($this,'json_strip_escape'),
		        $clearFunction
		    );
		}

		/**
		 * [json_strip_escape description]
		 * @param  [type] $string [description]
		 * @return [type]         [description]
		 */
		function json_strip_escape($string)
		{	
		    return str_replace(
				array('\r','\n','\t','\"', '\\\\','\\/'),
				array('','','','"','\\','/'),
				substr($string[0],1,-1)
			);
		}

		/**
		 * [putJS description]
		 * @return [type] [description]
		 */
		function putJS()
		{
			//$this->JSParams['columnDefs']=array(array("targets"=> -1,"data"=> null,"render"=> "function ( data, type, row ) {return '<a href=#>'+ row[3]+'</a>';}"),array("targets"=> -1,"data"=> null,"render"=> "function ( data, type, row ) {return '<a href=#>'+ row[3]+'</a>';}"));
		
			$js = 'var '.$this->JStableName.' = $("'.$this->JStableIdentifier.'").DataTable('."\n";
			if(!empty($this->JSParams))
			{
				$json=json_encode((object) $this->JSParams);
				$json=$this->json_func_expr($json);
			}
			else
			{
				$json=''."\n";
			}
			$js .=$json;
			$js .=');';
			$js .=implode('', $this->extJS);
			return $js;
		}

		/**
		 * [putExternalJS description]
		 * @return [type] [description]
		 */
		function putExternalJS()
		{
			$js=implode('', $this->externalJS);
			return $js;
		}

		/**
		 * [getHtml description]
		 * @return [type] [description]
		 */
		function getHtml($attributes=null)
		{
			$html='';
			if($this->JStableIdentifier!="")
			{
				if($this->JStableIdentifier[0]=='.')
				{
					$class=str_replace('.', '',$this->JStableIdentifier);
					if($attributes!=null)
					{
						$html .='<table class="'.$class.'"'.$attributes.'>';
					}
					else
					{
						$html .='<table class="'.$class.'">';
					}
					
					$html .=$this->columnHeaders;
					$html .="<tbody><tr><td></td></tr></tbody>";
					$html .=$this->columnFooters;
					$html .='</table>';
				}
				elseif($this->JStableIdentifier[0]=='#')
				{
					$id=str_replace('#', '',$this->JStableIdentifier);
					if($attributes!=null)
					{
						$html .='<table id="'.$id.'"'.$attributes.'>';
					}
					else
					{
						$html .='<table id="'.$id.'">';
					}
					//$html .='<table id="'.$id.'">';
					$html .=$this->columnHeaders;
					$html .="<tbody><tr><td></td></tr></tbody>";
					$html .=$this->columnFooters;
					$html .='</table>';
					
				}				
			}
			return $html;
			//echo '<script type="text/javascript">alert(\''.$html.'\')</script>';
		}

		/**
		 * [getColumnHeaders description]
		 * @param  [type] $cols [description]
		 * @return [type]       [description]
		 */
		function getColumnHeaders($cols=null)
		{
			$colFooter=array();
			$colHeader='<thead>';
			if($cols!=null)
			{
				$colHeader .'<tr>';
				if(is_array($cols))
				{
					$this->columns=$cols;
					foreach ($cols as $key => $value) {
						$colHeader .='<th>'.$value.'</th>';
						$colFooter[]='';
					}
				}
				$colHeader .'</tr>';
			}
			$colHeader .='</thead>';
			$this->columnHeaders=$colHeader;
			$this->getColumnFooters($colFooter);
			//echo '<script type="text/javascript">alert('.$this->columnHeaders.')</script>';			
		}

		/**
		 * [getColumnBoth description]
		 * @param  [type] $cols [description]
		 * @return [type]       [description]
		 */
		function getColumnBoth($cols=null)
		{
			$this->getColumnHeaders($cols);
			$this->getColumnFooters($cols);
			//echo '<script type="text/javascript">alert('.$this->columnHeaders.')</script>';			
		}

		/**
		 * [getColumnSum description]
		 * @param  [type] $colIndex [description]
		 * @return [type]           [description]
		 */
		function getColumnSum($colIndex=null)
		{
			$colFooter='';
			if($colIndex!=null)
			{
				$colFooter= "function ( row, data, start, end, display ) {var api = this.api(), data;var intVal = function ( i ) {return typeof i === 'string' ?i.replace(/[\\$,]/g, '')*1 :typeof i === 'number' ?i : 0;};pageTotal = api.column(".$colIndex.", { page: 'current'} ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );$( api.column(".$colIndex." ).footer() ).html('$'+pageTotal);}";
				//$colFooter="function ( row, data, start, end, display ) {var api = this.api(), data;var intVal = function ( i ) {return typeof i === 'string' ?i.replace(/[\\$,]/g, ')*1 :typeof i === 'number' ?i : 0;};total = api.column( ".$colIndex." ).data().reduce( function (a, b) {return intVal(a) + intVal(b);} );pageTotal = api.column( ".$colIndex.", { page: 'current'} ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );$( api.column( ".$colIndex." ).footer() ).html('$'+pageTotal +' ( $'+ total +' total)');}";
				$this->JSParams["footerCallback"]=$colFooter;
			}
			//$this->getColumnFooters();
		}

		/**
		 * [setColumnLink description]
		 * @param [type] $link     [description]
		 * @param [type] $colIndex [description]
		 * @param [type] $text     [description]
		 */
		function setColumnLink($link=null, $colIndex=null,$text=null)
		{
			$colFooter='';
			if($colIndex!=null)
			{
				$colFooter= 'function(row,data,index) {$(\'td\', row).eq('.$colIndex.').html("<a href=#>"+data['.$colIndex.']+"</a>"); }';
				//$colFooter="function ( row, data, start, end, display ) {var api = this.api(), data;var intVal = function ( i ) {return typeof i === 'string' ?i.replace(/[\\$,]/g, ')*1 :typeof i === 'number' ?i : 0;};total = api.column( ".$colIndex." ).data().reduce( function (a, b) {return intVal(a) + intVal(b);} );pageTotal = api.column( ".$colIndex.", { page: 'current'} ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );$( api.column( ".$colIndex." ).footer() ).html('$'+pageTotal +' ( $'+ total +' total)');}";
				$this->JSParams["createdRow"]=$colFooter;
			}
		}

		/**
		 * [getColumnFooters description]
		 * @param  [type] $cols [description]
		 * @return [type]       [description]
		 */
		function getColumnFooters($cols=null)
		{
			$colHeader=array();
			$colFooter='<tfoot><tr>';
			if($cols!=null)
			{
				$colFooter .'';
				if(is_array($cols))
				{
					foreach ($cols as $key => $value) {
						$colFooter .='<th>'.$value.'</th>';
						$colHeader[]='';
					}
				}
				$colFooter .'';
			}
			$colFooter .='</tr></tfoot>';
			$this->columnFooters=$colFooter;
			//$this->getColumnFooters($colHeader);
			//echo '<script type="text/javascript">alert('.$this->columnHeaders.')</script>';			
		}

		//function setAction($)

		/**
		 * [loadJS description]
		 * @param  [type] $array [description]
		 * @return [type]        [description]
		 */
		function loadJS($array=null)
		{			
			$js=array();
			if($array!=null)
			{
				 if(is_array($array))
				 {
				 	foreach ($array as $key => $value) {
				 		$this->js[]='<script type="text/javascript" src="'.$value.'"></script>';
				 	}
				 }
				 else
				 {
				 	$this->js[]='<script type="text/javascript" src="'.$array.'"></script>';
				 }
			}
			$js=implode('',$this->js);
			return $js;
		}

		/**
		 * [loadCSS description]
		 * @param  [type] $array [description]
		 * @return [type]        [description]
		 */
		function loadCSS($array=null)
		{
			$css=array();
			if($array!=null)
			{
				 if(is_array($array))
				 {
				 	foreach ($array as $key => $value) {
				 		$this->css[]='<link rel="stylesheet" type="text/css" href="'.$value.'">';
				 	}
				 }
				 else
				 {
				 	$this->css[]='<link rel="stylesheet" type="text/css" href="'.$array.'">';
				 }
			}
			$css=implode('',$this->css);
			return $css;
		}

		/**
		 * [loadStatJS description]
		 * @param  [type] $array [description]
		 * @return [type]        [description]
		 */
		function loadStatJS($array=null)
		{			
			$js=array();
			if($array!=null)
			{
				 if(is_array($array))
				 {
				 	foreach ($array as $key => $value) {
				 		$js[]='<script type="text/javascript" src="'.$value.'"></script>';
				 	}
				 }
				 else
				 {
				 	$js[]='<script type="text/javascript" src="'.$array.'"></script>';
				 }
			}
			$js=implode('',$js);
			return $js;
		}

		/**
		 * [loadStatCSS description]
		 * @param  [type] $array [description]
		 * @return [type]        [description]
		 */
		function loadStatCSS($array=null)
		{
			$css=array();
			if($array!=null)
			{
				 if(is_array($array))
				 {
				 	foreach ($array as $key => $value) {
				 		$css[]='<link rel="stylesheet" type="text/css" href="'.$value.'">';
				 	}
				 }
				 else
				 {
				 	$css[]='<link rel="stylesheet" type="text/css" href="'.$array.'">';
				 }
			}
			$css=implode('',$css);
			return $css;
		}

		/**
		 * [getJS description]
		 * @param  [type] $js [description]
		 * @return [type]     [description]
		 */
		function getJS($js=null)
		{
			if($js!=null)
			{
				$this->js[]=$js;
			}
		}

		/**
		 * [getCSS description]
		 * @param  [type] $css [description]
		 * @return [type]      [description]
		 */
		function getCSS($css=null)
		{
			if($css!=null)
			{
				$this->css[]=$css;
			}
		}

		/**
		 * [data_output description]
		 * @param  [type] $columns [description]
		 * @param  [type] $data    [description]
		 * @return [type]          [description]
		 */
		function data_output ( $columns, $data,$orgs=null)
	    {
	        $out = array();

	        for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
	            $row = array();
	            $fields=array();
	            for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
	                $column = $columns[$j];
	                if(isset($column['db']))
	                {
	                	$col=explode('.',$column['db']);
		                if(isset($col[1]))
		                {
		                	$field=$col[1];
		                }
		                else
		                {
		                	$field=$col[0];
		                }             

		                // Is there a formatter?
		                if ( isset( $column['formatter'] ) ) {
		                	if($field=='ind_org_id')
		                	{
		                		$tmp = $column['formatter']( $data[$i][$field], $data[$i] );
		                		if($tmp!='' && $tmp!=0)
						        {
						            $org_rs['org_name']=$orgs[$column['formatter']( $data[$i][$field], $data[$i] )];
						        }
						        else
						        {
						            $org_rs=array();
						            $org_rs['org_name']='';
						        }
						        $row[$j]=$org_rs['org_name'];
		                	}
		                	else
		                	{			                	
		                    	$row[$j] = $column['formatter']( $data[$i][$field], $data[$i] );
		                	}
		                }
		                else {
		                	if($field=='ind_org_id')
		                	{
		                		$tmp = $data[$i][$field];
		                		if($tmp!='' && $tmp!=0)
						        {
						            $org_rs['org_name']=$orgs[$data[$i][$field]];
						                    }
						        else
						        {
						            $org_rs=array();
						            $org_rs['org_name']='';
						        }
						        $row[$j]=$org_rs['org_name'];
		                	}
		                	else
		                	{			                	
		                    	$row[$j] = $data[$i][$field];
		                	}
		                    
		                }
	                }		                
	            }
	            $out[] = $row;
	        }

	        return $out;
	    }

	    function data_export ( $columns, $data,$orgs=null)
	    {
	        $out = array();

	        for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
	            $row = array();
	            $fields=array();
	            for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
	                $column = $columns[$j];
	                if(isset($column['db']))
	                {
	                	$col=explode('.',$column['db']);
		                if(isset($col[1]))
		                {
		                	$field=$col[1];
		                }
		                else
		                {
		                	$field=$col[0];
		                }             

		                // Is there a formatter?
		                if ( isset( $column['formatter'] ) ) {
		                	if($field=='ind_org_id')
		                	{
		                		$tmp = $column['formatter']( $data[$i][$field], $data[$i] );
		                		if($tmp!='' && $tmp!=0)
						        {
						            $org_rs['org_name']=$orgs[$column['formatter']( $data[$i][$field], $data[$i] )];
						        }
						        else
						        {
						            $org_rs=array();
						            $org_rs['org_name']='';
						        }
						        $row[$j]=$org_rs['org_name'];
		                	}
		                	else
		                	{			                	
		                    	$row[$j] = $column['formatter']( $data[$i][$field], $data[$i] );
		                	}
		                }
		                else {
		                	
		                    
		                }
	                }		                
	            }
	            $out[] = $row;
	        }

	        return $out;
	    }


	    /**
	     * [limit description]
	     * @param  [type] $request [description]
	     * @param  [type] $columns [description]
	     * @return [type]          [description]
	     */
	    function limit ( $request, $columns )
	    {
	        $limit = '';

	        if ( isset($request['start']) && $request['length'] != -1 ) {
	            $limit = "LIMIT ".intval($request['start']).", ".intval($request['length']);
	        }

	        return $limit;
	    }

	    /**
	     * [order description]
	     * @param  [type] $request [description]
	     * @param  [type] $columns [description]
	     * @return [type]          [description]
	     */
	    function order ( $request, $columns)
	    {
	        $order = '';
	        if ( isset($request['order']) && count($request['order']) ) {
	            $orderBy = array();
	            //$dtColumns = $this->pluck( $columns, 'dt' );
	            $dtColumns=array_keys($columns);

	            for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
	                // Convert the column index into the column data property
	                $columnIdx = intval($request['order'][$i]['column']);
	                $requestColumn = $request['columns'][$columnIdx];

	                $columnIdx = array_search( $requestColumn['data'], $dtColumns );
	                $column = $columns[ $columnIdx ];

	                if ( $requestColumn['orderable'] == 'true' ) {
	                    $dir = $request['order'][$i]['dir'] === 'asc' ?
	                        'ASC' :
	                        'DESC';

	                    $orderBy[] = $column['db'].' '.$dir;
	                }
	            }
	            if(count($orderBy)>0)
	            {
	            	$order = 'ORDER BY '.implode(', ', $orderBy);
	            }
	            	
	        }

	        return $order;
	    }

	    /**
	     * [filter description]
	     * @param  [type] $request  [description]
	     * @param  [type] $columns  [description]
	     * @param  [type] $bindings [description]
	     * @return [type]           [description]
	     */
	    function filter ( $request, $columns, &$bindings)
	    {
	    	$value=array();
	        $globalSearch = array();
	        $columnSearch = array();
	        //$dtColumns = $this->pluck( $columns, 'dt' );
	        $dtColumns=array_keys($columns);

	        if ( isset($request['search']) && $request['search']['value'] != '' ) {
	            $str = $request['search']['value'];

	            for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
	                $requestColumn = $request['columns'][$i];
	                $columnIdx = array_search( $requestColumn['data'], $dtColumns );
	                $column = $columns[ $columnIdx ];

	                if ( $requestColumn['searchable'] == 'true' ) {	                    
	                    //$globalSearch[] = $column['db']." LIKE ".$binding;
	                    $chk=explode('.', $column['db']);
	                    $chk=isset($chk[1])?$chk[1]:$chk[0];
	                    if($chk=='dst_id' || $chk=='grp_dst_id' || $chk=='ind_district_id' || $chk=='grp_vdc_id' || $chk=='ind_vdc_id' || $chk=='vdc_id')
	                    {
	                    	$globalSearch[] = $column['db']." = '".$str."'";
	                    }
	                    else
	                    {
	                    	$binding = $this->bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
	                    	$globalSearch[] = $column['db']." LIKE '%".$str."%'";
	                    }
	                    
	                    $value[] = $str;
	                }
	            }
	        }

	        $customSearch=array();

	        // Individual column filtering
	        for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
	            $requestColumn = $request['columns'][$i];
	            $columnIdx = array_search( $requestColumn['data'], $dtColumns );
	            $column = $columns[ $columnIdx ];

	            $str = $requestColumn['search']['value'];

	            if ( $requestColumn['searchable'] == 'true' &&
	                $str != '' ) {
	            	$chk=explode('.', $column['db']);
	                $chk=isset($chk[1])?$chk[1]:$chk[0];
	            	if($chk=='trn_beneficiary_type' || $chk=='trn_type' || $chk=='dst_id' || $chk=='grp_dst_id' || $chk=='ind_district_id' || $chk=='grp_vdc_id' || $chk=='ind_vdc_id' || $chk=='vdc_id')
                    {
                    	$columnSearch[] = $column['db']." = '".$str."'";
                    }
                    else
                    {
                    	if(in_array($chk,$this->globalCustomSearch))
                    	{
                    		if (strpos($chk,'id') !== false) {
							    $binding = $this->bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
		                    	$customSearch[] = $column['db']."='".$str."'";
							}
							else
							{
								$binding = $this->bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
		                    	$customSearch[] = $column['db']." LIKE '%".$str."%'";
							}
	                    		
                    	}
                    	else
                    	{
                    		$binding = $this->bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
	                    	$columnSearch[] = $column['db']." LIKE '%".$str."%'";
                    	}
	                    	
                    }	                
	                $value[] = $str;
	            }
	        }

	        // Combine the filters into a single string
	        $where = '';

	        if ( count( $globalSearch ) ) {
	            $where = '('.implode(' OR ', $globalSearch).')';
	        }

	        if ( count( $columnSearch ) ) {
	            $where = $where === '' ?
	                implode(' AND ', $columnSearch) :
	                $where .' AND '. implode(' AND ', $columnSearch);
	        }
	        if( count ( $customSearch ) ) {
	        	if($where!='')
	        	{
	        		$where = $where .' AND ( '. implode(' OR ',$customSearch).' )';
	        	}
	        	else
	        	{
	        		$where = $where .' ( '. implode(' OR ',$customSearch).' )';
	        	}
	        	
	        }



	        if ( $where !== '' ) {
	            $where = 'WHERE '.$where;
	        }

	        return array($where,$value);
	    }

	    /**
	     * [setColumnAttributes description]
	     * @param [type] $columns [description]
	     */
	    function setColumnAttributes($columns)
	    {
	    	$footer='<tfoot><tr>';
	    	$this->columns=$columns;
	    	$cols=array();	    	
	    	foreach ($columns as $key => $value) {
	    		$col=array();
	    		$col['targets']=$key;
	    		$footer .='<th></th>';
	    		foreach ($value as $k => $v) {
	    			if($k!="db" && $k!="formatter")
	    			{
	    				$col[$k]=$v;
	    			}
	    			
	    		}

	    		$cols[]=$col;
	    	}
	    	$footer.='</tr></tfoot>';
	    	$this->columnFooters=$footer;
	    	$this->columnAttributes=$cols;
	    	$this->JSParams['columnDefs']=$this->columnAttributes;	    	
	    }

	    /**
	     * [simple description]
	     * @param  [type] $request     [description]
	     * @param  [type] $sql_details [description]
	     * @param  [type] $table       [description]
	     * @param  [type] $primaryKey  [description]
	     * @param  [type] $columns     [description]
	     * @param  [type] $joinQuery   [description]
	     * @param  string $extraWhere  [description]
	     * @param  string $groupBy     [description]
	     * @return [type]              [description]
	     */
	    function paginate ( $request, $table, $primaryKey, $columns, $joinQuery = NULL, $extraWhere = '', $groupBy = '')
	    {
	    	if(count($this->columns)>0)
	    	{
	    		$columns=$this->columns;
	    	}
	    	
	        $bindings = array();
	        //$db = $this->sql_connect( $sql_details );

	        // Build the SQL query string from the request
	        $limit = $this->limit( $request, $columns );
	        $order = $this->order( $request, $columns);
	        $where = $this->filter( $request, $columns, $bindings);
	        $value=$where[1];
	        $where=$where[0];

	        //$this->setColumnAttributes($columns);
	        if($groupBy!='')
	        {
	        	$groupBy =" GROUP BY ".$groupBy;	
	        }

	  		//if (strpos($a,'are') !== false) {
			//     echo 'true';
			// }
			if ( $where !== '' ) {
	            if($extraWhere!=='')
	            {
	            	$extraWhere = ' AND '.$extraWhere ;
	            }
	        }
	        else
	        {
	        	if($extraWhere!=='')
	            {
	            	$extraWhere = 'WHERE '.$extraWhere ;
	            }
	        }

	        $col = $this->pluck($columns, 'db', $joinQuery);
	        //print_r($col);
            $query =  "SELECT SQL_CALC_FOUND_ROWS DISTINCT($primaryKey), ".implode(", ", $col)." FROM $table $joinQuery $where $extraWhere $groupBy $order $limit";
			@session_start();
			//$_SESSION['qry1']=$query;
			//echo $query;
			$this->instance=new Database();
	        $data=$this->instance->pdoQuery($query)->results();
	        //$data = $this->sql_exec( $this->dbConnect, $bindings,$query);
	        //return ;

	        // Data set length after filtering
	        $dta=$this->instance->pdoQuery("SELECT FOUND_ROWS() as row_count")->result();
	        $recordsFiltered = $dta['row_count'];
	        $recordsTotal = $dta['row_count'];

	        $org_id=array();
		    $org='';
		    $org_ids=array();
		    $orgs=array();
		    foreach ($data as $key => $value) {
		    	if(isset($value['ind_org_id']))
		    	{
		    		if($value['ind_org_id']!='' && $value['ind_org_id']!=0)
			        {
			            $org_id[]=$value['ind_org_id'];
			        }
		    	}
			        
		    }
		    if(count($org_id)>0)
		    {
		        $org=implode(',',$org_id);
		        //$org_ids=$sl->dtQuery("wi_organization_g",array("org_deleted"=>0), " AND org_id IN ($org) ")->results();
		        $org_ids=$this->instance->dtQuery("SELECT org_id,org_name FROM wi_organization_g WHERE org_id IN ($org)")->results();
		        //print_r($org_ids);
		        foreach ($org_ids as $key => $value) {
		            $orgs[$value['org_id']]=$value['org_name'];
		        }
		    }
	        /*
	         * Output
	         */
	        $dt= array(
	            "draw"            => intval( $request['draw'] ),
	            "recordsTotal"    => intval( $recordsTotal ),
	            "recordsFiltered" => intval( $recordsFiltered ),
	            "data"            => $this->data_output( $columns, $data,$orgs)
	        );
	        ////$_SESSION['dt']=$dt;
	        return $dt;
	    }

	    function export ( $request, $table, $primaryKey, $columns, $joinQuery = NULL, $extraWhere = '', $groupBy = '')
	    {
	    	if(count($this->columns)>0)
	    	{
	    		$columns=$this->columns;
	    	}
	    	
	        $bindings = array();
	        //$db = $this->sql_connect( $sql_details );

	        // Build the SQL query string from the request
	        $limit = $this->limit( $request, $columns );
	        $order = $this->order( $request, $columns);
	        $where = $this->filter( $request, $columns, $bindings);
	        $value=$where[1];
	        $where=$where[0];

	        //$this->setColumnAttributes($columns);
	        if($groupBy!='')
	        {
	        	$groupBy =" GROUP BY ".$groupBy;	
	        }

	  		//if (strpos($a,'are') !== false) {
			//     echo 'true';
			// }
			if ( $where !== '' ) {
	            if($extraWhere!=='')
	            {
	            	$extraWhere = ' AND '.$extraWhere ;
	            }
	        }
	        else
	        {
	        	if($extraWhere!=='')
	            {
	            	$extraWhere = 'WHERE '.$extraWhere ;
	            }
	        }

	        $col = $this->pluck($columns, 'db', $joinQuery);
	        //print_r($col);
            $query =  "SELECT SQL_CALC_FOUND_ROWS DISTINCT($primaryKey), ".implode(", ", $col)."
			 FROM $table
			 $joinQuery
			 $where
			 $extraWhere
			 $groupBy
			 $order";
			@session_start();
			//$_SESSION['qry1']=$query;
			//echo $query;
			$this->instance=new Database();
	        $data=$this->instance->pdoQuery($query)->results();
	        //$data = $this->sql_exec( $this->dbConnect, $bindings,$query);
	        //return ;

	        // Data set length after filtering
	        $dta=$this->instance->pdoQuery("SELECT FOUND_ROWS() as row_count")->result();
	        $recordsFiltered = $dta['row_count'];
	        $recordsTotal = $dta['row_count'];

	        $org_id=array();
		    $org='';
		    $org_ids=array();
		    $orgs=array();
		    foreach ($data as $key => $value) {
		    	if(isset($value['ind_org_id']))
		    	{
		    		if($value['ind_org_id']!='' && $value['ind_org_id']!=0)
			        {
			            $org_id[]=$value['ind_org_id'];
			        }
		    	}
			        
		    }
		    if(count($org_id)>0)
		    {
		        $org=implode(',',$org_id);
		        //$org_ids=$sl->dtQuery("wi_organization_g",array("org_deleted"=>0), " AND org_id IN ($org) ")->results();
		        $org_ids=$this->instance->dtQuery("SELECT org_id,org_name FROM wi_organization_g WHERE org_id IN ($org)")->results();
		        //print_r($org_ids);
		        foreach ($org_ids as $key => $value) {
		            $orgs[$value['org_id']]=$value['org_name'];
		        }
		    }
	        /*
	         * Output
	         */
	        $dt= $this->data_export( $columns, $data,$orgs);
	        ////$_SESSION['dt']=$dt;
	        return $dt;
	    }

	    /**
	     * [sql_connect description]
	     * @param  [type] $sql_details [description]
	     * @return [type]              [description]
	     */
	    function sql_connect ( $sql_details )
	    {
	        try {
	            $this->dbConnect = @new PDO(
	                "mysql:host={$sql_details['host']};dbname={$sql_details['db']}",
	                $sql_details['user'],
	                $sql_details['pass'],
	                array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
	            );
	        }
	        catch (PDOException $e) {
	            $this->fatal(
	                "An error occurred while connecting to the database. ".
	                "The error reported by the server was: ".$e->getMessage()
	            );
	        }

	        //$this->db
	        return $this->dbConnect;
	    }

	    /**
	     * [sql_exec description]
	     * @param  [type] $db       [description]
	     * @param  [type] $bindings [description]
	     * @param  [type] $sql      [description]
	     * @return [type]           [description]
	     */
	    function sql_exec ( $db, $bindings, $sql=null )
	    {
	        // Argument shifting
	        if ( $sql === null ) {
	            $sql = $bindings;
	        }

	        $stmt = $this->instance->prepare( $sql );
	        //echo $sql;

	        // Bind parameters
	        if ( is_array( $bindings ) ) {
	            for ( $i=0, $ien=count($bindings) ; $i<$ien ; $i++ ) {
	                $binding = $bindings[$i];
	                $stmt->bindValue( $binding['key'], $binding['val'], $binding['type'] );
	            }
	        }

	        // Execute
	        try {
	            $stmt->execute();
	        }
	        catch (PDOException $e) {
	            $this->fatal( "An SQL error occurred: ".$e->getMessage() );
	        }

	        // Return all
	        return $stmt->fetchAll();
	    }

	    /**
	     * [fatal description]
	     * @param  [type] $msg [description]
	     * @return [type]      [description]
	     */
	    function fatal ( $msg )
	    {
	        echo json_encode( array(
	            "error" => $msg
	        ) );

	        exit(0);
	    }

	    /**
	     * [bind description]
	     * @param  [type] $a    [description]
	     * @param  [type] $val  [description]
	     * @param  [type] $type [description]
	     * @return [type]       [description]
	     */
	    function bind ( &$a, $val, $type )
	    {
	        $key = ':binding_'.count( $a );

	        $a[] = array(
	            'key' => $key,
	            'val' => $val,
	            'type' => $type
	        );

	        return $key;
	    }

	    /**
	     * [pluck description]
	     * @param  [type] $a    [description]
	     * @param  [type] $prop [description]
	     * @return [type]       [description]
	     */
	    function pluck ( $a, $prop)
	    {
	        $out = array();

	        for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
	        	if(isset($a[$i][$prop]))
	        	{
	        		$out[] = $a[$i][$prop];
	        	}	            
	        }

	        return $out;
	    }
	}