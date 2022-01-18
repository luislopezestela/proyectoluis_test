(function( $ ){
	var editorObj;
	var methods = {
		saveSelection: function() {
		// Función para guardar el rango de selección de texto del editor.
			$(this).data('editor').focus();
		    if (window.getSelection) {
		        sel = window.getSelection();
		        if (sel.getRangeAt && sel.rangeCount) {
		            $(this).data('currentRange', sel.getRangeAt(0));
		        }
		    } else if (document.selection && document.selection.createRange) {
		        $(this).data('currentRange',document.selection.createRange());
		    }
		    else
		    	$(this).data('currentRange', null);
		},

		restoreSelection: function(text,mode) {
			// Función para restaurar el rango de selección de texto desde el editor
			var node;
			typeof text !== 'undefined' ? text : false;
			typeof mode !== 'undefined' ? mode : "";
			var range = $(this).data('currentRange');
		    if (range) {
		        if (window.getSelection) {
		        	if(text){
		            	range.deleteContents();
		            	if(mode=="html")
	            		{
    			            var el = document.createElement("div");
				            el.innerHTML = text;
				            var frag = document.createDocumentFragment(), node, lastNode;
				            while ( (node = el.firstChild) ) {
				                lastNode = frag.appendChild(node);
				            }
				            range.insertNode(frag);
	            		}
		            	else
            				range.insertNode( document.createTextNode(text) );

		            }
		            sel = window.getSelection();
		            sel.removeAllRanges();
		            sel.addRange(range);		            
		        }
		        else if (document.selection && range.select) {
		            range.select();
		            if(text)
		            {
		            	if(mode=="html")
		            		range.pasteHTML(text);
		            	else
		            		range.text = text;
		            }
		        }
		    }
		},

		restoreIESelection:function() {
			// Función para restaurar el rango de selección de texto desde el editor en IE
			var range = $(this).data('currentRange');
		    if (range) {
		        if (window.getSelection) {
		            sel = window.getSelection();
		            sel.removeAllRanges();
		            sel.addRange(range);
		        } else if (document.selection && range.select) {
		            range.select();
		        }
		    }
		},

		insertTextAtSelection:function(text,mode) {
		    var sel, range, node ;
		    typeof mode !== 'undefined' ? mode : "";
		    if (window.getSelection) {
		        sel = window.getSelection();
		        if (sel.getRangeAt && sel.rangeCount) {
		            range = sel.getRangeAt(0);
		            range.deleteContents();
		            var textNode = document.createTextNode(text); 
		            
		            if(mode=="html")
		            { 
		                var el = document.createElement("div");
		                el.innerHTML = text;
		                var frag = document.createDocumentFragment(), node, lastNode;
		                while ( (node = el.firstChild) ) {
		                    lastNode = frag.appendChild(node);
		                }
		                range.insertNode(frag);
		            }
		            else
		            { 
		            	range.insertNode(textNode);
		            	range.selectNode(textNode);
		            }
		            sel.removeAllRanges();
		            range = range.cloneRange();		            
		            range.collapse(false);
		            sel.addRange(range);
		        }
		    } else if (document.selection && document.selection.createRange) { 
		        range = document.selection.createRange();
		        range.pasteHTML(text);
		        range.select();
		    }
		},

		imageWidget: function(){
			// clase para el widget que maneja la carga de archivos
			var row = $('<div/>',{
				"class":"row"
			}).append($('<div/>',{
				id :"imgErrMsg"
			}));
			var container = $('<div/>',{'class':"tabbable tabs-left"});
			var navTabs = $('<ul/>',
									{ class: "nav nav-tabs"
							}).append($('<li/>').append($('<a/>',{
											"href":"#imageFromLinkBar",
											"data-toggle":"tab"
										}).html("Desde una url")));

			var tabContent 		= $("<div/>", {class:"tab-content"});
			var uploadImageBar  = $("<div/>",{
				id: "uploadImageBar",
				class: "tab-pane active"
			});

		
			var chooseFromLocal = $('<input/>',{
				type: "file",
				class:"inline-form-control",
				multiple: "multiple"
			});		
			uploadImageBar.append(chooseFromLocal);
			var imageFromLinkBar = $("<div/>",{
				id: "imageFromLinkBar",
				class: "tab-pane"
			});		
			var getImageURL = $("<div/>", {class:"input-group"});
			var imageURL = $('<input/>',{
				type: "url",
				class:'form-control',
				id:"imageURL",
				placeholder: "URL de la imagen"
			}).appendTo(getImageURL);
			var getURL = $("<button/>",{
				class:"btn btn-success",
				type:"button"
			}).html("Ingresar").click(function(){
				var url = $('#imageURL').val();
				if(url ==''){
					methods.showMessage.apply(this,["imgErrMsg","Por favor ingrese la url de la imagen"]);
					return false;
				}
				var li = $('<li/>',{class:"span6 col-xs-12 col-sm-6 col-md-3 col-lg-3"});
				var a = $('<a/>',{
					href:"javascript:void(0)",
					class:"thumbnail"
				});
				var image = $('<img/>',{
					src:url,
				}).error(function(){
				  	methods.showMessage.apply(this,["imgErrMsg","URL de imagen no sirve"]); 
				  	return false;
				}).load( function() { $(this).appendTo(a).click(function(){
					$('#imageList').data('current', $(this).attr('src'));
				});
				li.append(a).appendTo($('#imageList'));
			});
			}).appendTo($("<span/>", {class:"input-group-btn form-control-button-right"}).appendTo(getImageURL));

			imageFromLinkBar.append(getImageURL);
			tabContent.append(imageFromLinkBar);
			container.append(navTabs).append(tabContent);						

			var imageListContainer = $("<div/>",{'class': 'col-xs-12 col-sm-12 col-md-12 col-lg-12'});
			var imageList = $('<ul/>',{"class":"thumbnails padding-top list-unstyled",
										"id": 'imageList'
			}).appendTo(imageListContainer);
			row.append(container).append(imageListContainer);
			return row;
		},

		tableWidget: function(mode){
			var idExtn ='';
			if(typeof mode!=='undefined')
				idExtn = "Edt";
					
			var tblCntr = $('<div/>',{ 
				class:"row-fluid"
				}).append($('<div/>',{ 
				 	id :"tblErrMsg"+idExtn 
				})).append($('<form/>',{ 
					id:"tblForm"+idExtn 
					}).append($('<div/>',{ 
						class:"row" 
						}).append($('<div/>',{ 
							id :"tblInputsLeft"+idExtn,
							class:"col-xs-12 col-sm-6 col-md-6 col-lg-6"
							}).append($('<label/>',{ for:"tblRows"+idExtn,	text:"Filas"}
							)).append($('<input/>',{
								id:"tblRows"+idExtn,
								type:"text",
								class:"form-control form-control-width",
								value:2
							})).append($('<label/>',{ for:"tblColumns"+idExtn,	text:"Columnas"}
							)).append($('<input/>',{
								id:"tblColumns"+idExtn,
								type:"text",
							 	class:"form-control form-control-width",
							 	value:2
							})).append($('<label/>',{ for:"tblWidth"+idExtn, text:"Ancho"}
							)).append($('<input/>',{
								id:"tblWidth"+idExtn,
								type:"text",
								class:"form-control form-control-width",
								value:400
							})).append($('<label/>',{ for:"tblHeight"+idExtn, text:"Altura"}
							)).append($('<input/>',{ 
								id:"tblHeight"+idExtn,
								type:"text",
								class:"form-control form-control-width", 
							}))
						).append($('<div/>',{
							id :"tblInputsRight"+idExtn,
							class:"col-xs-12 col-sm-6 col-md-6 col-lg-6"
							}).append($('<label/>',{ for:"tblAlign"+idExtn, text:"Alineacion"}
							)).append($('<select/>',{ id:"tblAlign"+idExtn, class:"form-control form-control-width"}
								).append($('<option/>',{ text:"Escoger", value:""}
								)).append($('<option/>',{ text:"Izquierda", value:"left"}
								)).append($('<option/>',{ text:"Centrar", value:"center"}
								)).append($('<option/>',{ text:"Derecha",	value:"right"}))
							).append($('<label/>',{	for:"tblBorder"+idExtn, text:"Tamaño de borde"}
							)).append($('<input/>',{ 
								id:"tblBorder"+idExtn,
								type:"text",
								class:"form-control form-control-width",
								value:1
							})).append($('<label/>',{ for:"tblCellspacing"+idExtn,	text:"espacio de celda"}
							)).append($('<input/>',{
								id:"tblCellspacing"+idExtn,
								type:"text", 
								class:"form-control form-control-width",
								value:1
							})).append($('<label/>',{ for:"tblCellpadding"+idExtn,	text:"espacio interior de celda"}
							)).append($('<input/>',{
								id:"tblCellpadding"+idExtn,
								type:"text",
								class:"form-control form-control-width",
								value:1
							}))
						)
					)
				)																	
			return tblCntr;
		},

		imageAttributeWidget: function(){

			var edtTablecntr=$('<div/>',{ 
				class:"row-fluid"}
				).append($('<div/>',{ 
				 	id :"imageErrMsg" 
				})).append($('<input/>',{ 
						id:"imgAlt",
						type:"text",
						class:"form-control form-control-link ",
						placeholder:"Texto alternativo",
					})).append($('<input/>',{
						id:"imgTarget",
						class:"form-control form-control-link ",
						type:"text",
						placeholder:"Enlace objetivo"
					})).append($('<input/>',{
						id:"imgHidden",
						type:"hidden"						
					}))
					
				return edtTablecntr;

		},

		getHTMLTable: function(tblRows,tblColumns,attributes){
			var tableElement = $('<table/>',{ class:"table" });
			for (var i = 0; i < attributes.length; i++){
				if(attributes[i].value!=''){
					if(attributes[i].attribute=="width" || attributes[i].attribute=="height")
	                  	tableElement.css(attributes[i].attribute,attributes[i].value);
					else
						tableElement.attr(attributes[i].attribute,attributes[i].value);
				}
			}
			for(var i=1; i<=tblRows; i++){
				var tblRow = $('<tr/>');
			 	for(var j=1; j<=tblColumns; j++){
			 		var tblColumn = $('<td/>').html('&nbsp;');
			 		tblColumn.appendTo(tblRow);
			 	}				
				tblRow.appendTo(tableElement);
			}
			return tableElement;
		},

		init : function( options )
		{
			var colors = [	{ name: 'Negro', hex: '#000000' },
							{ name: 'Medio negro', hex: '#444444' },
							{ name: 'Negro blillante', hex: '#666666' },
							{ name: 'Negro tenuo', hex: '#999999' },
							{ name: 'Gris', hex: '#CCCCCC' },
							{ name: 'Blanco', hex: '#FFFFFF' },


							{ name: 'Rojo', hex: '#FF0000' },
							{ name: 'Naranja', hex: '#FF9900' },
							{ name: 'Amarillo', hex: '#FFFF00' },
							{ name: 'Limon', hex: '#00FF00' },
							{ name: 'Cyan', hex: '#00FFFF' },
							{ name: 'Azul', hex: '#0000FF' },
							{ name: 'VioletaAzul', hex: '#8A2BE2' },
							{ name: 'Magenta', hex: '#FF00FF' },
							
							{ name: 'CadetBlue', hex: '#76A5AF' },
							{ name: 'DeepSkyBlue', hex: '#6FA8DC' },
							{ name: 'MediumPurple', hex: '#8E7CC3' },
							{ name: 'MediumVioletRed', hex: '#C27BA0' },

							{ name: 'Crimson', hex: '#CC0000' },
							{ name: 'SandyBrown', hex: '#E69138' },
							{ name: 'Gold', hex: '#F1C232' },
							{ name: 'MediumSeaGreen', hex: '#6AA84F' },
							{ name: 'Teal', hex: '#45818E' },
							{ name: 'SteelBlue', hex: '#3D85C6' },
							{ name: 'SlateBlue', hex: '#674EA7' },
							{ name: 'VioletRed', hex: '#A64D79' },

							{ name: 'Brown', hex: '#990000' },
							{ name: 'Chocolate', hex: '#B45F06' },
							{ name: 'GoldenRod', hex: '#BF9000' },
							{ name: 'Green', hex: '#38761D' },
							{ name: 'SlateGray', hex: '#134F5C' },
							{ name: 'RoyalBlue', hex: '#0B5394' },
							{ name: 'Indigo', hex: '#351C75' },
							{ name: 'Maroon', hex: '#741B47' },

							{ name: 'DarkRed', hex: '#660000' },
							{ name: 'SaddleBrown', hex: '#783F04' },
							{ name: 'DarkGoldenRod', hex: '#7F6000' },
							{ name: 'DarkGreen', hex: '#274E13' },
							{ name: 'DarkSlateGray', hex: '#0C343D' },
							{ name: 'Navy', hex: '#073763' },
							{ name: 'MidnightBlue', hex: '#20124D' },
							{ name: 'DarkMaroon', hex: '#4C1130' } ];

			var specialchars = [{ name:"Exclamacion ", text:"!"},
								{ name:"Arroba", text:"@"},
								{ name:"Almoadilla", text:"#"},
								{ name:"Porcentaje", text:"%"},
								{ name:"", text:"^"},
								{ name:"", text:"&"},
								{ name:"asterisco", text:"*"},
								{ name:"", text:"("},
								{ name:"", text:")"},
								{ name:"Guion bajo", text:"_"},
								{ name:"guion", text:"-"},
								{ name:"Mas", text:"+"},
								{ name:"Igual", text:"="},
								{ name:"", text:"["},
								{ name:"", text:"]"},
								{ name:"", text:"{"},
								{ name:"", text:"}"},
								{ name:"", text:"|"},
								{ name:"Dos puntos", text:":"},
								{ name:"Punto y coma", text:";"},
								{ name:"", text:"&#39;"},
								{ name:"", text:"&#34;"},
								{ name:"", text:"&lsquo;"},
								{ name:"", text:"&rsquo;"},
								{ name:"", text:"&#47;"},
								{ name:"", text:"&#92;"},
								{ name:"", text:"<"},
								{ name:"", text:">"},
								{ name:"", text:"?"},
								{ name:"", text:"~"},
								{ name:"", text:"`"},
								{ name:"", text:"&micro;"},
								{ name:"", text:"&para;"},
								{ name:"", text:"&plusmn;"},
								{ name:"", text:"&trade;"},
								{ name:"Copyright", text:"&copy;"},
								{ name:"Registrado", text:"&reg;"},
								{ name:"Seccion", text:"&sect;"},
								{ name:"", text:"&#187;"},
								{ name:"", text:"&#188;"},
								{ name:"", text:"&#189;"},
								{ name:"", text:"&#190;"},
								{ name:"Dolar", text:"$"},
								{ name:"Euro", text:"&euro;"},
								{ name:"Soles", text:"&#83;&#47;&#46;"},];
			
			var menuItems = { 'fonteffects': true,
							  'texteffects': true,
							  'aligneffects': true,
							  'textformats':true,
							  'actions' : true,
							  'insertoptions' : true,
							  'extraeffects' : true,
							  'advancedoptions' : true,
							  'screeneffects':true,

							  'color'	: { "text":"<div class='icono_colores'></div>",
											"tooltip": "Colores",
											"commandname":null,
											"custom":function(button){
													var editor = $(this);
													var flag = 0;
													var paletteCntr   = $('<div/>',{id:"paletteCntr",class:"activeColour", css :{"display":"none","width":"335px"}}).click(function(event){event.stopPropagation();});
													var paletteDiv    = $('<div/>',{id:"colorpellete"});
													var palette       = $('<ul />',{id:"color_ui"}).append($('<li />').css({"width":"145px","display":"Block","height":"25px"}).html('<div>Color de texto</div>'));
													var bgPalletteDiv = $('<div/>',{id:"bg_colorpellete"});
													var bgPallette    = $('<ul />',{id:"bgcolor_ui"}).append($('<li />').css({"width":"145px","display":"Block","height":"25px"}).html('<div> Color de fondo</div>'));
													if(editor.data("colorBtn")){
														flag = 1;
														editor.data("colorBtn",null);
													}
													else
														editor.data("colorBtn",1);
													if(flag==0){
														for (var i = 0; i < colors.length; i++){
															if(colors[i].hex!=null){
															    palette.append($('<li />').css('background-color', colors[i].hex).mousedown(function(event){ event.preventDefault();}).click(function(){															
																	var hexcolor = methods.rgbToHex.apply(this,[$(this).css('background-color')]);
																	methods.restoreSelection.apply(this);
																	methods.setStyleWithCSS.apply(this);
																	document.execCommand('forecolor',false,hexcolor);
																	$('#paletteCntr').remove();

																	editor.data("colorBtn",null);
																}));

																bgPallette.append($('<li />').css('background-color', colors[i].hex).mousedown(function(event){ event.preventDefault();}).click(function(){															
																var hexcolor = methods.rgbToHex.apply(this,[$(this).css('background-color')]);
																methods.restoreSelection.apply(this);
																methods.setStyleWithCSS.apply(this);
																document.execCommand('backColor',false,hexcolor);
																$('#paletteCntr').remove();
																editor.data("colorBtn",null);
																}));
															}
															else{
																palette.append($('<li />').css({"width":"145px","display":"Block","height":"5px"}));
																bgPallette.append($('<li />').css({"width":"145px","display":"Block","height":"5px"}));
															}
														} 
														palette.appendTo(paletteDiv);
														bgPallette.appendTo(bgPalletteDiv);
														paletteDiv.appendTo(paletteCntr);
														bgPalletteDiv.appendTo(paletteCntr)																												
														paletteCntr.insertAfter(button);
														$('#paletteCntr').slideDown('slow');
													}
													else 
														$('#paletteCntr').remove();
												}},
							
							  'bold'	: { "text": "<div class='bold_editor_icono'>N</div>", 
											"tooltip": "Negrita", 
											"commandname":"bold", 
											"custom":null },

						      'italics'	: { "text":"<div class='italic_editor_icono'>I</div>",
											"tooltip":"Cursiva", 
											"commandname":"italic",
											"custom":null },

						     'underline': { "text":"<div class='under_editor_icono'>U</div>",
											"tooltip":"Subrayar", 
											"commandname":"underline",
											"custom":null },
											
						     'strikeout': { "text": "<div class='tachado_editor_icono'>S</div>",
											"tooltip": "Tachado", 
											"commandname":"strikeThrough", 
											"custom":null },

						     'undo'		: { "text": "<div class='editor_el_icono'><i class='deshacer_icono'></i></div>", 
											"tooltip": "Deshacer", 
											"commandname":"undo", 
											"custom":null },

						     'redo'		: { "text": "<div class='editor_el_icono_dos'><i class='rehacer_icono'></i></div>",
											"tooltip": "Rehacer", 
											"commandname":"redo", 
											"custom":null },

						     'l_align'	: { "text": "<div class='eliminar_formato_editor'><img src='datos/imagenes/justify-left.png'></div>",
											"tooltip": "Alinear a la izquierda", 
											"commandname":"justifyleft", 
											"custom":null },

						     'r_align'	: { "text": "<div class='eliminar_formato_editor'><img src='datos/imagenes/justify-right.png'></div>",
											"tooltip": "Alinear a la derecha", 
											"commandname":"justifyright", 
											"custom":null },

						     'c_align'	: { "text": "<div class='eliminar_formato_editor'><img src='datos/imagenes/justify-center.png'></div>", 
											"tooltip": "Alinear al centro", 
											"commandname":"justifycenter", 
											"custom":null },

						     'justify'	: { "text": "<div class='eliminar_formato_editor'><img src='datos/imagenes/justify.png'></div>", 
											"tooltip": "Justificar", 
											"commandname":"justifyfull", 
											"custom":null },

							'rm_format'	: { "text": "<div class='eliminar_formato_editor'><img src='datos/imagenes/eraser.png'></div>",
											"tooltip": "Eliminar formato", 
											"commandname":"removeformat", 
											"custom":null },

							'splchars'	: { "text": "<div class='caracter_editor_icono'>@</div>", 
											"tooltip": "Insertar carácter especial", 
											"commandname":null,
											"custom":function(button){
													methods.restoreIESelection.apply(this);
													var flag =0;
													var splCharDiv = $('<div/>',{id:"specialchar", class:"specialCntr", css :{"display":"none"}}).click(function(event) { event.stopPropagation();});
													var splCharUi  = $('<ul />',{id:"special_ui"});
													var editor_Content = this; 
													if($(this).data("editor").data("splcharsBtn")){
														flag = 1;
														$(this).data("editor").data("splcharsBtn", null);
													}
													else
														$(this).data("editor").data("splcharsBtn", 1);

													if(flag==0){
														for (var i = 0; i < specialchars.length; i++){															
															splCharUi.append($('<li />').html(specialchars[i].text).attr('title',specialchars[i].name).mousedown(function(event){ event.preventDefault();}).click(function(event){
																if(navigator.userAgent.match(/MSIE/i)){
																	var specCharHtml = $(this).html();
																	methods.insertTextAtSelection.apply(this,[specCharHtml,'html']);
																}
																else{
																	document.execCommand('insertHTML',false,$(this).html());
																}
																$('#specialchar').remove();
																$(editor_Content).data("editor").data("splcharsBtn", null);
															}));
														}														
														splCharUi.prependTo(splCharDiv);
														splCharDiv.insertAfter(button)
														$('#specialchar').slideDown('slow');
													}
													else
														$('#specialchar').remove();
											}},
										   };

			var menuGroups = {'texteffects' : ['bold', 'italics', 'underline', 'color'],
							  'aligneffects': ['l_align','c_align', 'r_align', 'justify'],
							  'actions' : ['undo', 'redo'],
							  'extraeffects' : ['strikeout', 'splchars'],
							  'advancedoptions' : ['rm_format']
							};

			var settings = $.extend({				
				'texteffects':true,
				'aligneffects':true,
				'actions' : true,
				'extraeffects' : true,
				'advancedoptions' : true,
				'bold': true,
				'italics': true,
				'underline':true,
				'undo':true,
				'redo':true,
				'l_align':true,
				'r_align':true,
				'c_align':true,
				'justify':true,
				'strikeout':true,
				'rm_format':true,
				'status_bar':true,
				'color':colors,
				'splchars':specialchars
			},options);

	       	var containerDiv = $("<div/>",{ class : "row-fluid Editor-container" });
			var $this = $(this).hide();	       	
	       	$this.after(containerDiv); 

	       	var menuBar = $( "<div/>",{ id : "menuBarDiv",
								  		class : "row-fluid"
							}).prependTo(containerDiv);
	       	var editor  = $( "<div/>",{	class : "Editor-editor",
										css : {overflow: "auto"},
										contenteditable:"true"
						 	}).appendTo(containerDiv);
			var statusBar = $("<div/>", {	id : "statusbar",
											class: "row-fluid",
											unselectable:"on",
							}).appendTo(containerDiv);
	       	$(this).data("menuBar", menuBar);
	       	$(this).data("editor", editor);
	       	$(this).data("statusBar", statusBar);
	       	var editor_Content = this;
	       	if(settings['status_bar']){
				editor.keyup(function(event){
					var wordCount = methods.getWordCount.apply(editor_Content);
					var charCount = methods.getCharCount.apply(editor_Content);
					$(editor_Content).data("statusBar").html('<div class=""></div>');
					$(editor_Content).data("statusBar").append('<div class="caracteres_editor">'+'Caracteres : '+charCount+'</div>');
            	});
	        }	        
	       	
	       	
	       	for(var item in menuItems){
	       		if(!settings[item] ){ //if the display is not set to true for the button in the settings.	       		
	       			if(settings[item] in menuGroups){
	       				for(var each in menuGroups[item]){
	       					settings[each] = false;
	       				}
	       			}
	       			continue;
	       		}
	       		if(item in menuGroups){
	       			var group = $("<div/>",{class:"btn-group"});	       			
	       			for(var index=0;index<menuGroups[item].length;index++){
	       				var value = menuGroups[item][index];	       				
	       				if(settings[value]){
       						var menuItem = methods.createMenuItem.apply(this,[menuItems[value], settings[value], true]);
       						group.append(menuItem);
       					}
       					settings[value] = false;
	       			}
	       			menuBar.append(group);	       				       			
	       		}
	       		else{
	       			var menuItem = methods.createMenuItem.apply(this,[menuItems[item], settings[item],true]);
	       			menuBar.append(menuItem);
	       		}	       		
	       	}

	       	//For contextmenu	       	
		    $(document.body).mousedown(function(event) {
		        var target = $(event.target);
		        if (!target.parents().andSelf().is('#context-menu')) { // Clicked outside
		            $('#context-menu').remove();
		        } 
		        if (!target.parents().andSelf().is('#specialchar') && (target.closest('a').html()!='<i class="fa fa-asterisk"></i>')) { //Clicked outside
		        	if($("#specialchar").is(':visible'))
		            {
						$(editor_Content).data("editor").data("splcharsBtn", null);
						$('#specialchar').remove();
		           	}
		        }
		        if (!target.parents().andSelf().is('#paletteCntr') && (target.closest('a').html()!='<i class="fa fa-font"></i>')) { //Clicked outside
		        	if($("#paletteCntr").is(':visible'))
		            {
						$(editor_Content).data("editor").data("colorBtn", null);
						$('#paletteCntr').remove();
		           	}
		        }
		    });
		    editor.bind("contextmenu", function(e){
	       		if($('#context-menu').length)
	       			$('#context-menu').remove();
	       		var cMenu 	= $('<div/>',{id:"context-menu"
	       						}).css({position:"absolute", top:e.pageY, left: e.pageX, "z-index":1
	       						}).click(function(event){
								    event.stopPropagation();
								});
	       		var cMenuUl = $('<ul/>',{ class:"dropdown-menu on","role":"menu"});
	       		e.preventDefault();
	       		if($(e.target).is('a')){
	       			methods.createLinkContext.apply(this,[e,cMenuUl]);
	       			cMenuUl.appendTo(cMenu);
	       		    cMenu.appendTo('body');
	       		}
	       		else if($(e.target).is('td') || $(e.target).is("th")){
	       			methods.createTableContext.apply(this,[e,cMenuUl]);
	       			cMenuUl.appendTo(cMenu);
	       		    cMenu.appendTo('body');
	       		}
	       		else if($(e.target).is('img')){
	       				       			
	       			methods.createImageContext.apply(this,[e,cMenuUl]);
	       			cMenuUl.appendTo(cMenu);
	       			cMenu.appendTo('body');
	       		}
	       	});
		},
	
		

		createModal: function(modalId, modalHeader, modalBody, onSave){
			//Create a Modal for the button.		
			var modalTrigger = $('<a/>',{	href:"#"+modalId,
											role:"button",
											class:"btn btn-default",
											"data-toggle":"modal"
			});
			var modalElement = $('<div/>',{ id: modalId,
								           class: "modal fade",
								              tabindex: "-1",
								              role: "dialog",
								              "aria-labelledby":"h3_"+modalId,
								              "aria-hidden":"true"
								          }).append($('<div>',{
								            	class:"modal-dialog"
								         		}).append($('<div>',{
							            			class:"modal-content"
									         		}).append($('<div>',{
									           			class:"modal-header"
									           			}).append($('<button/>',{
										                	type:"button",
										                	class:"close",
										                	"data-dismiss":"modal",
										                	"aria-hidden":"true"
										               		}).html('x')
									            		).append($('<h3/>',{
									                		id:"h3_"+modalId
									           				}).html(modalHeader))
									         		).append($('<div>',{
									           			class:"modal-body"
									           			}).append(modalBody)
									          		).append($('<div>',{
									            		class:"modal-footer"
									         			}).append($('<button/>',{
									                		type:"button",
									                		class:"btn btn-default",
									                		"data-dismiss":"modal",
									                		"aria-hidden":"true"
									               			}).html('Cancelar')
								           	  			).append($('<button/>',{
								                			type:"button",
								                			class:"btn btn-success",
								               				}).html('Aceptar').mousedown(function(e){
								                			e.preventDefault();
								               				}).click(function(obj){return function(){onSave.apply(obj)}}(this)))
	         								  		)
       											)	
       									);	
			modalElement.appendTo("body");
			return modalTrigger;
		},

		createMenuItem: function(itemSettings, options, returnElement){
	
			typeof returnElement !== 'undefined' ? returnElement : false;

			if(itemSettings["select"]){
				var menuWrapElement = $("<div/>", {class:"btn-group"});
				var menuElement 	= $("<ul/>", {class:"dropdown-menu"});
				menuWrapElement.append($('<a/>',{
										class:"btn btn-default dropdown-toggle",
										"data-toggle":"dropdown",
										"href":"javascript:void(0)",
										"title":itemSettings["tooltip"]
										}).html(itemSettings["default"]).append($("<span/>",{class:"caret"})).mousedown(function(e){
											e.preventDefault();
										}));
				$.each(options,function(i,v){
					var option = $('<li/>')
		            $("<a/>",{
		              tabindex : "-1",
		              href : "javascript:void(0)"
		            }).html(i).appendTo(option);

		            option.click(function(){
		            	$(this).parent().parent().data("value", v);
		            	$(this).parent().parent().trigger("change")
		            });
		            menuElement.append(option);		            
		        });
				var action = "change";
		    }
		    else if(itemSettings["modal"]){
		    	var menuWrapElement = methods.createModal.apply(this,[itemSettings["modalId"], itemSettings["modalHeader"], itemSettings["modalBody"], itemSettings["onSave"]]);		    			    	
		    	var menuElement = $("<i/>");
		    	if(itemSettings["icon"])
					menuElement.addClass(itemSettings["icon"]);
				else
					menuElement.html(itemSettings["text"]);
				menuWrapElement.append(menuElement);
				menuWrapElement.mousedown(function(obj, methods, beforeLoad){
					return function(e){
						e.preventDefault();
						methods.saveSelection.apply(obj);
						if(beforeLoad){		    	    
							beforeLoad.apply(obj); 					
				    	}
					}
				}(this, methods,itemSettings["beforeLoad"]));
				menuWrapElement.attr('title', itemSettings['tooltip']);
				return menuWrapElement;
		    }
			else{
				var menuWrapElement = $("<a/>",{href:'javascript:void(0)', class:'btn btn-default'});
				var menuElement = $("<i/>");
				if(itemSettings["icon"])
					menuElement.addClass(itemSettings["icon"]);
				else
					menuElement.html(itemSettings["text"]);
				var action = "click";
			}
			if(itemSettings["custom"]){
				menuWrapElement.bind(action, (function(obj, params){
						return function(){
						methods.saveSelection.apply(obj);
						itemSettings["custom"].apply(obj, [$(this), params]);
						}
					})(this, itemSettings['params']));
			}
			else{
				menuWrapElement.data("commandName", itemSettings["commandname"]);
				menuWrapElement.data("editor", $(this).data("editor"));
				menuWrapElement.bind(action, function(){ methods.setTextFormat.apply(this) });
			}
			menuWrapElement.attr('title', itemSettings['tooltip']);
			menuWrapElement.css('cursor', 'pointer');
			menuWrapElement.append(menuElement);
			if(returnElement)
				return menuWrapElement;
			$(this).data("menuBar").append(menuWrapElement);
		},

		setTextFormat: function(){			
			//Function to run the text formatting options using execCommand.
			methods.setStyleWithCSS.apply(this);
			document.execCommand($(this).data("commandName"), false, $(this).data("value") || null);
			$(this).data("editor").focus();
			return false;
		},

		getSource: function(button, params){
			//Function to show the html source code to the editor and toggle the text display.
			var flag = 0;
			if(button.data('state')){
				flag = 1;
				button.data('state', null);
			}
			else
				button.data('state', 1);
			$(this).data("source-mode", !flag);
			var editor = $(this).data('editor');
			var content;
			if(flag==0){ //Convert text to HTML			
				content = document.createTextNode(editor.html());
				editor.empty();
				editor.attr('contenteditable', false);
				preElement = $("<pre/>",{
					contenteditable: true					
					});
				preElement.append(content);				
				editor.append(preElement);
				button.parent().siblings().hide();
				button.siblings().hide();
			}
			else{
				var html = editor.children().first().text();
				editor.html(html);
				editor.attr('contenteditable', true);
				button.parent().siblings().show();
				button.siblings().show();
			}
		},

		countWords: function(node){
			//Function to count the number of words recursively as the text grows in the editor.
			var count = 0;	
    		var textNodes = node.contents().filter(function() { 
				return (this.nodeType == 3); 
			});			
			for(var index=0;index<textNodes.length;index++){
				text = textNodes[index].textContent;
				text = text.replace(/[^-\w\s]/gi, ' ');
				text = $.trim(text);
				count = count + text.split(/\s+/).length;
			}
			var childNodes = node.children().each(function(){
				count = count + methods.countWords.apply(this, [$(this)]);
			});
			return count
		},

		countChars: function(node){
			//Function to count the number of characters recursively as the text grows in the editor.
			var count = 0;
    		var textNodes = node.contents().filter(function() { 
				return (this.nodeType == 3); 
			});
			for(var index=0;index<textNodes.length;index++){
				text = textNodes[index].textContent;
				count = count + text.length;
			}
			var childNodes = node.children().each(function(){
				count = count + methods.countChars.apply(this, [$(this)]);
			});
			return count;
		},

		getWordCount: function(){
			//Function to return the word count of the text in the editor
			return methods.countWords.apply(this, [$(this).data("editor")]);
		},

		getCharCount: function(){
			//Function to return the character count of the text in the editor
			return methods.countChars.apply(this, [$(this).data("editor")]);
		},

		rgbToHex: function(rgb){
			//Function to convert the rgb color codes into hexadecimal code
			rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			return "#" +
			("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
			("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
			("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
		},

		showMessage: function(target,message){
			//Function to show the error message. Supplied arguments:target-div id, message-message text to be displayed.
			var errorDiv=$('<div/>',{ class:"alert alert-danger"	}
				).append($('<button/>',{
									type:"button",
									class:"close",
									"data-dismiss":"alert",
									html:"x"
				})).append($('<span/>').html(message));
			errorDiv.appendTo($('#'+target));
			setTimeout(function() { $('.alert').alert('close'); }, 3000);								
		},
		
		getText: function(){
			//Function to get the source code.
			if(!$(this).data("source-mode"))
				return $(this).data("editor").html();
			else
				return $(this).data("editor").children().first().text();
		},

		setText: function(text){
			//Function to set the source code
			if(!$(this).data("source-mode"))
				$(this).data("editor").html(text);
			else
				$(this).data("editor").children().first().text(text);
		},

		setStyleWithCSS:function(){
			if(navigator.userAgent.match(/MSIE/i)){	//for IE10
				try {
                	Editor.execCommand("styleWithCSS", 0, false);
            	} catch (e) {
	                try {
	                    Editor.execCommand("useCSS", 0, true);
	                } catch (e) {
	                    try {
	                        Editor.execCommand('styleWithCSS', false, false);
	                    }
	                    catch (e) {
	                    }
	                }
            	}
			}
			else{
				document.execCommand("styleWithCSS", null, true);
			}
		},				

	}

	$.fn.Editor = function( method ){

		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.Editor' );
		}    
	}; 
})( jQuery );