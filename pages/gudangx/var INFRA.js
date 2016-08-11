var INFRA = function() {
    var load_block = function(message) {
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: 0.5,
                color: '#fff'
            },
            message: message
        });
    }

    var unblock = function(delay) {
        setTimeout(function() {
            $.unblockUI();
        }, delay);
    }

    var handlePortletTools = function() {
        jQuery('.portlet .tools a.remove').click(function() {
            var removable = jQuery(this).parents(".portlet");
            if (removable.next().hasClass('portlet') || removable.prev().hasClass('portlet')) {
                jQuery(this).parents(".portlet").remove();
            } else {
                jQuery(this).parents(".portlet").parent().remove();
            }
        });

        jQuery('.portlet .tools a.reload').click(function() {
            var el = jQuery(this).parents(".portlet");
            App.blockUI(el);
            window.setTimeout(function() {
                App.unblockUI(el);
            }, 1000);
        });

        jQuery('.portlet .tools .collapse, .portlet .tools .expand').click(function() {
            var el = jQuery(this).parents(".portlet").children(".portlet-body");
            if (jQuery(this).hasClass("collapse")) {
                jQuery(this).removeClass("collapse").addClass("expand");
                el.slideUp(200);
            } else {
                jQuery(this).removeClass("expand").addClass("collapse");
                el.slideDown(200);
            }
        });

        /*
        sample code to handle portlet config popup on close
        $('#portlet-config').on('hide', function (e) {
            //alert(1);
            //if (!data) return e.preventDefault() // stops modal from being shown
        });

        */
    }

    return {
        handlePortletTools: function() {
            handlePortletTools()
        },
        block: function(msg) {
            load_block(msg);
        },
        unblock: function(delay) {
            unblock(delay);
        },

        nullConverter: function(val) {
            var retval = val;
            if (val == null || val == '' || typeof val == 'undefined') {
                retval = '-';
            }
            return retval;
        },

        toRp: function(angka) {
            var rev = parseInt(angka, 10).toString().split('').reverse().join('');
            var rev2 = '';
            for (var i = 0; i < rev.length; i++) {
                rev2 += rev[i];
                if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                    rev2 += '.';
                }
            }
            return '' + rev2.split('').reverse().join('') + ',00';
        },

        logout: function() {
            $.ajax({
                url: BASE_URL + 'sistem/sesi/logout',
                complete: function(response) {
                    window.location.reload();
                }
            })
        },
        loadPage: function(el) {
            load_block('Sedang Memuat Halaman <i class="icon-refresh icon-spin"></i>');
            var page = $(el).data();
            $.ajax({
                url: BASE_URL + "sistem/dashboard/get_page",
                data: page,
                type: "POST",
                complete: function(pages) {
                    var resp_object = $.parseJSON(pages.responseText);
                    $.when(function() {
                        $("#pagecontainer").css('visibility', 'hidden');
                        $("#pagecontainer").html(atob(resp_object.view));
                        $('#pagetitle').html(resp_object.menu_title).css('cursor', 'pointer').unbind('click').bind('click', function(event) {
                            $("[data-menuid=" + page.menuid + "]").trigger('click');
                        });

                        $('#box-title').html('Tabel ' + resp_object.menu_title);
                        $('#pagesubtitle').html(resp_object.menu_keterangan);
                        $('#con_breadcrumb').html(atob(resp_object.breadcrumb));
                        $("a.btn.green,a.btn.yellow,a.btn.red,a.btn.blue,a.btn").addClass('minip');
                    }()).then(function() {
                        var container = $("#pagecontainer");
                        if (resp_object.rights.length > 0) {
                            $.each(resp_object.rights, function(i, v) {
                                var role_object = $("[data-role=" + v.menu_kode + "]", container);
                                if ($(role_object).data('roleable')) {
                                    $(role_object).addClass('aman');
                                }
                            });
                            $.each($('[data-roleable=true]', container), function(i, v) {
                                if (!$(v).hasClass('aman')) {
                                    if ($(v).data('tab')) {
                                        window.li = $(v)[0];
                                        if (li) {
                                            $(li.nextElementSibling).find('a').trigger('click');
                                        }
                                    }
                                    $(v).remove();
                                } else {
                                    $(v).removeClass('aman');
                                }
                            })
                        }
                    }()).then(function() {
                        $("#pagecontainer").css('visibility', 'visible');
                        unblock(100);
                    }())
                },
                error: function(pages, status, errorname) {
                    $('#pagetitle').html(errorname);
                    $('#box-title').html('');
                    $('#pagesubtitle').html('');
                    $('#con_breadcrumb').html('');
                    $("#pagecontainer").html(pages.responseText);
                    unblock(100);
                }
            }).done(function() {
                $('html,body').animate({
                    scrollTop: 0
                }, 'fast');
            }());
            $(".menu_parent").each(function(i, v) {
                $(v).removeClass('active');
            });
            $(el).parent().addClass('active');
        },

        init_table: function(config) {
            var xdefault = {
                "aLengthMenu": [
                    [5, 10, 15, 25, 50, 100],
                    [5, 10, 15, 25, 50, 100]
                ],
                "bDestroy": true,
                "iDisplayLength": 25,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "bProcessing": true,
                'bServerSide': true,
                "bAutoWidth": true,
                "sScrollY": "400px",
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sEmptyTable": "Tidak ada data yang dapat ditampilkan",
                    "sInfoEmpty": "Tidak ada data yang dapat ditampilkan",
                    "sInfoFiltered": "(Ditemukan dari  total _MAX_ data)",
                    "sZeroRecords": "Tidak ada data yang cocok",
                    "sSearch": "Pencarian:",
                    "sProcessing": "Sedang memproses data...",
                    "sLoadingRecords": "Sedang memuat data...",
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "aoColumnDefs": [{
                        "bSortable": false,
                        "bSearchable": true,
                        "aTargets": [0]
                    }
                    /*, {
                    "bSortable": false,
                    "bSearchable": true,
                    "aTargets": [1]
                }, */
                ],
                "aaSorting": [
                    [2, 'asc']
                ],
                drawCallback: function(oSettings) {
                    /*binding listener for each row*/
                    $('.row_selected').removeClass('row_selected');
                    $(".table tbody tr").each(function(i, v) {
                        $(v).on('click', function() {
                            $('.row_selected').removeClass('row_selected');
                            $(v).addClass('row_selected');
                            $(v.firstChild.firstChild).prop('checked', true);
                        });
                    });
                },
                fnRowCallback: function(row, data, index, rowIndex) {

                },
                fnInitComplete: function(oSettings, data) {

                },

                "ajax": {
                    'url': config.url,
                    'type': 'POST'
                },
            };
            var el = $("#" + config.el);
            /* el.columns().every( function () {
                var that = this;
         
                $( '[type="search"]').on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );*/
            $('[type="search"]').on('keyup change', function() { // for text boxes
                // alert();
                /* var i =$(this).attr('data-column');  // getting column index
                var v =$(this).val();  // getting search input value
                $(el).dataTable.columns(i).search(v).draw();*/
            });
            var dt = $(el).dataTable($.extend({}, xdefault, config));
            $(el).addClass('table-condensed').removeClass('table-striped').addClass('compact nowrap hover dt-head-left');
            return dt;
        },

        toggle_form: function(config) {
            config = $.extend({}, {
                speed: 'fast',
                easing: 'swing',
                callback: function() {},
                tohide: 'table_data',
                toshow: 'table_form'
            }, config);
            $("." + config.tohide).fadeOut(config.speed, function() {
                $("." + config.toshow).fadeIn(config.speed, config.callback)
            });
            $('html,body').animate({
                scrollTop: 0 /*pos + (offeset ? offeset : 0)*/
            }, 'slow');
        },

        save: function(config) {
            config = $.extend({}, {
                form: null,
                confirm: false,
                data: $('[name=' + config.form + ']').serialize(),
                method: 'POST',
                url: ($("[name=" + INFRA.fields[0] + "]").val() === "") ? INFRA.api.create : INFRA.api.update,
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: 'application/x-www-form-urlencoded',
                processData: false,
                success: function(response) {
                    // console.log(response);
                    INFRA.showMessage({
                        success: response.success,
                        message: response.message,
                        title: ((response.success) ? 'Sukses' : 'Gagal')
                    });
                    unblock(100);
                },
                error: function(response, status, errorname) {
                    INFRA.showMessage({
                        success: false,
                        title: errorname,
                        message: 'Terjadi Kesalahan Sistem, hubungi Administrator'
                    });
                    unblock(100);
                },
                complete: function(response) {
                    config.callback(response);
                },
                callback: function(arg) {}
            }, config);

            var do_save = function(_config) {
                load_block('Sedang menyimpan data <i class="icon-refresh icon-spin"></i>');
                $.ajax({
                    url: _config.url,
                    data: _config.data,
                    type: _config.method,
                    cache: _config.cache,
                    contentType: _config.contentType,
                    processData: _config.processData,
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    success: _config.success,
                    error: _config.error,
                    complete: _config.complete
                });
            }

            if (config.confirm) {
                if (confirm('Apakah Anda yakin akan menyimpan data tersebut?')) {
                    do_save(config);
                }
            } else {
                do_save(config);
            }
        },

        delete: function(config) {
            config = $.extend({}, {
                table: null,
                confirm: true,
                method: 'POST',
                url: INFRA.api.delete,
                callback: function(arg) {}
            }, config);

            var do_delete = function(_config, id) {
                load_block('Sedang menghapus data <i class="icon-refresh icon-spin"></i>');
                $.ajax({
                    url: _config.url,
                    data: {
                        id: id
                    },
                    type: _config.method,
                    success: function(response) {
                        INFRA.showMessage({
                            success: response.success,
                            message: response.message,
                            title: ((response.success) ? 'Sukses' : 'Gagal')
                        });
                        unblock(100);
                    },
                    error: function(response, status, errorname) {
                        INFRA.showMessage({
                            success: false,
                            title: 'Gagal melakukan operasi',
                            message: errorname + ', Data tersebut kemungkinan masih digunakan di tabel lain<br>'
                        });
                        unblock(100);
                    },
                    complete: function(response) {
                        config.callback(response);
                    }
                })
            }
            var data = null;
            $("#" + config.table).find('input[name=radio-grid]').each(function(key, value) {
                if ($(value).is(":checked")) {
                    data = $.parseJSON(atob($(value).data('record')));
                }
            });
            if (data !== null) {
                var id = data[INFRA.fields[0]];
                if (config.confirm) {
                    if (confirm('Apakah Anda yakin akan menghapus data tersebut ?')) {
                        do_delete(config, id);
                    }
                } else {
                    do_delete(config, id);
                }
            } else {
                INFRA.showMessage({
                    title: 'Informasi',
                    message: 'Silahkan pilih terlebih dahulu baris dengan memilih pada bulatan sebelah kiri table { <input type="radio"> }',
                    image: './assets/img/information.png',
                    time: 2000
                })
            }
        },

        load_data: function(config) {
            config = $.extend({}, {
                debug: false,
                table: null,
                before_load: function() {},
                after_load: function() {},
                callback: function() {}
            }, config);
            config.before_load();
            var data = null;

            $("#" + config.table).find('input[name=radio-grid]').each(function(key, value) {
                if ($(value).is(":checked")) {
                    data = $.parseJSON(atob($(value).data('record')));
                    if (config.debug) {
                        // console.log(data);
                    }
                }
            });

            if (data !== null) {
                INFRA.fields.forEach(function(v, i, a) {
                    if ($("[name=" + v + "]").attr('type') == 'radio') {
                        $('[name="' + v + '"][value="' + data[v] + '"]').prop('checked', true);
                    } else {
                        $("[name=" + v + "]").val(data[v])
                    }
                });
                config.callback(data);
                return data;
            } else {
                INFRA.showMessage({
                    title: 'Informasi',
                    message: 'Silahkan pilih terlebih dahulu baris dengan memilih pada bulatan sebelah kiri table { <input type="radio"> }',
                    image: './assets/img/information.png',
                    time: 2000
                })
            }
        },

        create_combo: function(config) {
            config = $.extend({}, {
                el: null,
                valueField: null,
                displayField: null,
                displayField2: null,
                url: null,
                chosen: false,
                grouped: false,
                withNull: true,
                idMode: false,
                data: null,
                /*experimental*/
                callback: function() {}
            }, config);
            if (config.idMode === true) {
                if (config.url === null) {
                    var html = (config.withNull === true) ? "<option value=NULL></option>" : "";
                    $('#' + config.el).html(html);
                    if (config.chosen) {
                        App.initChosenSelect('select#' + config.el);
                        $(".chzn-container").css({
                            width: '100%'
                        });
                        $(".chzn-drop").css({
                            width: '100%'
                        });
                        $(".chzn-search input").css({
                            width: '90%'
                        });
                        $('#' + config.el).trigger('liszt:updated');
                    }
                } else {
                    $.ajax({
                        url: config.url,
                        data: config.data,
                        type: 'POST',
                        complete: function(response) {
                            var html = (config.withNull === true) ? "<option value=NULL></option>" : "";
                            $('#' + config.el).html(html);
                            var data = $.parseJSON(response.responseText);
                            if (data.success) {
                                $.each(data.data, function(i, v) {
                                    if (config.grouped) {
                                        html += "<option value='" + v[config.valueField] + "'>" + v[config.displayField2] + " - " + v[config.displayField] + "</option>";
                                    } else {
                                        html += "<option value='" + v[config.valueField] + "'>" + v[config.displayField] + "</option>";
                                    }
                                });
                                $('#' + config.el).html(html);
                                if (config.chosen) {
                                    App.initChosenSelect('select#' + config.el);
                                    $(".chzn-container").css({
                                        width: '100%'
                                    });
                                    $(".chzn-drop").css({
                                        width: '100%'
                                    });
                                    $(".chzn-search input").css({
                                        width: '90%'
                                    });
                                    $('#' + config.el).trigger('liszt:updated');
                                }
                            }
                        }

                    });
                }
            } else {
                if (config.url === null) {
                    var html = (config.withNull === true) ? "<option value=NULL></option>" : "";
                    $('[name=' + config.el + ']').html(html);
                    if (config.chosen) {
                        App.initChosenSelect('select[name=' + config.el + ']');
                        $(".chzn-container").css({
                            width: '50%'
                        });
                        $(".chzn-drop").css({
                            width: '50%'
                        });
                        $(".chzn-search input").css({
                            width: '50%'
                        });
                        $('[name=' + config.el + ']').trigger('liszt:updated');
                    }
                } else {
                    $.ajax({
                        url: config.url,
                        data: config.data,
                        type: 'POST',
                        complete: function(response) {
                            var html = (config.withNull === true) ? "<option value=NULL></option>" : "";
                            $('[name=' + config.el + ']').html(html);
                            var data = $.parseJSON(response.responseText);
                            if (data.success) {
                                $.each(data.data, function(i, v) {
                                    if (config.grouped) {
                                        html += "<option value='" + v[config.valueField] + "'>" + v[config.displayField2] + " - " + v[config.displayField] + "</option>";
                                    } else {
                                        html += "<option value='" + v[config.valueField] + "'>" + v[config.displayField] + "</option>";
                                    }
                                });
                                $('[name=' + config.el + ']').html(html);
                                if (config.chosen) {
                                    App.initChosenSelect('select[name=' + config.el + ']');
                                    $(".chzn-container").css({
                                        width: '50%'
                                    });
                                    $(".chzn-drop").css({
                                        width: '50%'
                                    });
                                    $(".chzn-search input").css({
                                        width: '50%'
                                    });
                                    $('[name=' + config.el + ']').trigger('liszt:updated');
                                }
                            }
                        }
                    });
                }
            }
            config.callback();
        },

        showMessage: function(config) {
            config = $.extend({}, {
                success: false,
                message: 'Kesalahan Sistem, hubungi Administrator',
                title: 'Gagal',
                time: 2000,
                sticky: false,
                image: ((config.success) ? './assets/img/success.png' : './assets/img/error.png'),
                callback: function() {},
            }, config);

            $.gritter.add({
                title: config.title,
                text: config.message,
                image: config.image,
                sticky: config.sticky,
                time: config.time,
                before_open: function() {
                    if ($('.gritter-item-wrapper').length == 3) {
                        return false;
                    }
                }
            });
            config.callback();
        },

        set_required: function(el) {
            $(el).each(function(i, v) {
                $("[name=" + v + "]").attr('required', true).parents('.control-group').children('.control-label').append('<span class="required">*</span>')
            })
        }
    }
}();

var _I = INFRA;

/*maps helper*/
var map, map1, mapadi
coords = new Array(),
polyline = null,
markers = new Array(),
polylines = new Array(),
tileServer = $("#app-mappath").val();

var MAPS = function(window, document, undefined) {
    return {
        init: function(config) {
            var _config = $.extend({}, {
                center: L.latLng('-7.969799', '112.630407'),
                // center: L.latLng(config.lat, config.lng),
                zoom: null,
                minZoom: 4,
                maxZoom: 18,
                coordinatesInfo: true,
                trackResize: true,
                withUpdate: false,
                editable: true,
                zoomControl: false,
                editing: true
            }, config);

            var map = L.map(_config.element, _config);
            // var url = 'http://' + tileServer + '/osm_tiles/{z}/{x}/{y}.png'; //offline
            var url = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';
            var osmAttrib = '';
            var osm = new L.TileLayer(url, {
                minZoom: _config.minZoom,
                maxZoom: _config.maxZoom,
                attribution: osmAttrib
            });
            map.setView(new L.LatLng('-7.969799', '112.630407'), _config.zoom);
            map.addLayer(osm);
            $(".leaflet-control-attribution.leaflet-control").hide();
            /*var gmap_layer = new L.Google('ROADMAP');
            map.addLayer(gmap_layer);   */

            map.on('mousemove', function(event) {
                if (_config.coordinatesInfo) {
                    // $(".leaflet-top.leaflet-right").html(event.latlng.lat + ' , ' + event.latlng.lng);
                }
            });
            new L.Control.Zoom({
                position: 'topright'
            }).addTo(map);

            //initialize update
            if (_config.withUpdate) {
                window.updater = [];
                $.ajax({
                    url: BASE_URL + 'sistem/mapupdater/select_updater_list',
                    success: function(response) {
                        $.each(response['data'], function(i, v) {
                            var path = [];
                            $.each(JSON.parse(v.map_koordinat), function(ind, val) {
                                path.push(L.latLng(val[0], val[1]));
                            })
                            window.updater.push(L.polyline(path, {
                                opacity: 1,
                                color: tinycolor(v.path_color).darken().darken(),
                                weight: parseInt(v.path_thickness) + 5
                            }).addTo(map));
                            window.updater.push(L.polyline(path, {
                                opacity: 1,
                                color: v.path_color,
                                weight: v.path_thickness
                            }).addTo(map));
                        })
                    }
                })
                map.on('zoomend', function(event) {

                })
            }


            return map;
        },

        addMarker: function(config) {
            var _defaultIconMarker = function() {
                var icon = L.icon({
                    iconUrl: 'assets/leaflet/images/marker-icon.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41],
                });
                return icon;
            }
            var _config = $.extend({}, {
                point: null,
                icon: _defaultIconMarker(),
                markerId: '',
                markerName: '',
                koordinat: null,
                labelNohide: true,
                map: map,
            }, config);
            if (_config.label) {
                marker = new L.Marker([_config.point.lat, _config.point.lng], _config).bindLabel(_config.title, {
                    noHide: _config.labelNohide
                }).addTo(_config.map);
            } else {
                marker = new L.Marker([_config.point.lat, _config.point.lng], _config).addTo(_config.map);
            }
            if (_config.markerId) {
                $(".leaflet-marker-icon").last().prop('id', _config.markerId);
                $(".leaflet-marker-icon").last().prop('name', _config.markerName);
                $(".leaflet-marker-icon").last().attr('data-koordinat', _config.koordinat);
                $(".leaflet-marker-icon").css('border-radius', 300);
            }
            markers.push(marker);
            return marker;
        },

        drawPath: function(config) {
            var _config = $.extend({}, {
                map: null,
                withMarker: true,
                markerId: '',
                markerName: '',
                point: null,
                color: '#FFFFFF'
            }, config);
            if (_config.withMarker) {
                this.addMarker(_config)
            }
            coords.push([_config.point.lat, _config.point.lng]);
            if (coords.length === 1) {
                polyline = L.polyline(coords, _config).addTo(_config.map);
            } else {
                polyline.addLatLng([_config.point.lat, _config.point.lng]);
            }
            polylines.push(polyline);
            return polyline;
        },

        resetMap: function(config) {
            var _config = $.extend({}, {
                map: null,
                polylines: polylines
            }, config);
            $.when(function() {
                if (polyline != null) {
                    $.each(_config.polylines, function() {
                        _config.map.removeLayer(this);
                    })
                }
                polyline = null;
                polylines = new Array();
                coords = new Array();
            }()).then(function() {
                $.each(markers, function() {
                    _config.map.removeLayer(this);
                })
                markers = new Array();
            }())
        },

        loadGPX: function(file) {
            var reader = new FileReader();
            reader.onloadend = function(evt) {
                if (evt.target.readyState == FileReader.DONE) {
                    try {
                        xml = $.parseXML(evt.target.result);
                        var c = [];
                        $(xml).find('trkpt').each(function(i, v) {
                            c.push([$(v).attr('lat'), $(v).attr('lon')]);
                        });
                        if (window.gpx) {
                            window.gpx.push(c);
                        } else {
                            window.gpx = [];
                            window.gpx.push(c);
                        }
                    } catch (e) {
                        INFRA.showMessage({
                            message: 'Berkas yang dipilih bukan file GPX yang valid, pilih file yang lain.',
                            success: false,
                            image: './assets/img/error.png',
                        });
                    }
                }
            }

            var files = $("#" + file)[0].files;
            if (files.length < 1) {
                INFRA.showMessage({
                    message: 'Pilih berkas GPX terlebih dahulu.',
                    success: false,
                    image: './assets/img/error.png',
                });
            } else {
                reader.readAsBinaryString(files[0].slice(0, files[0].size));
            }
        },

        findLayerById: function(_map, _id) {
            var retval = null;
            $.each(_map._layers, function(i, v) {
                if (i === _id) {
                    retval = v;
                }
            })
            return retval;
        },

        convert2DMS: function(dms, type) {
            var sign = 1,
                Abs = 0;
            var days, minutes, seconds, direction;

            if (dms < 0) {
                sign = -1;
            }
            Abs = Math.abs(Math.round(dms * 1000000.));
            //Math.round is used to eliminate the small error caused by rounding in the computer:
            //e.g. 0.2 is not the same as 0.20000000000284
            //Error checks
            if (type == "lat" && Abs > (90 * 1000000)) {
                //alert(" Degrees Latitude must be in the range of -90. to 90. ");
                return false;
            } else if (type == "lon" && Abs > (180 * 1000000)) {
                //alert(" Degrees Longitude must be in the range of -180 to 180. ");
                return false;
            }

            days = Math.floor(Abs / 1000000);
            minutes = Math.floor(((Abs / 1000000) - days) * 60);
            seconds = (Math.floor(((((Abs / 1000000) - days) * 60) - minutes) * 100000) * 60 / 100000).toFixed();
            days = days * sign;
            if (type == 'lat') direction = days < 0 ? 'LS' : 'LU';
            if (type == 'lon') direction = days < 0 ? 'BB' : 'BT';
            //else return value     
            return (days * sign) + 'Âº ' + minutes + "' " + seconds + "\" " + direction;
        }


    }
}(window, document);

var dateFormat = function() {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
        timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
        timezoneClip = /[^-+\dA-Z]/g,
        pad = function(val, len) {
            val = String(val);
            len = len || 2;
            while (val.length < len) val = "0" + val;
            return val;
        };

    // Regexes and supporting functions are cached through closure
    return function(date, mask, utc) {
        var dF = dateFormat;

        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date)) throw SyntaxError("invalid date");

        mask = String(dF.masks[mask] || mask || dF.masks["default"]);

        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var _ = utc ? "getUTC" : "get",
            d = date[_ + "Date"](),
            D = date[_ + "Day"](),
            m = date[_ + "Month"](),
            y = date[_ + "FullYear"](),
            H = date[_ + "Hours"](),
            M = date[_ + "Minutes"](),
            s = date[_ + "Seconds"](),
            L = date[_ + "Milliseconds"](),
            o = utc ? 0 : date.getTimezoneOffset(),
            flags = {
                d: d,
                dd: pad(d),
                ddd: dF.i18n.dayNames[D],
                dddd: dF.i18n.dayNames[D + 7],
                m: m + 1,
                mm: pad(m + 1),
                mmm: dF.i18n.monthNames[m],
                mmmm: dF.i18n.monthNames[m + 12],
                yy: String(y).slice(2),
                yyyy: y,
                h: H % 12 || 12,
                hh: pad(H % 12 || 12),
                H: H,
                HH: pad(H),
                M: M,
                MM: pad(M),
                s: s,
                ss: pad(s),
                l: pad(L, 3),
                L: pad(L > 99 ? Math.round(L / 10) : L),
                t: H < 12 ? "a" : "p",
                tt: H < 12 ? "am" : "pm",
                T: H < 12 ? "A" : "P",
                TT: H < 12 ? "AM" : "PM",
                Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
            };

        return mask.replace(token, function($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();

// Some common format strings
dateFormat.masks = {
    "default": "ddd mmm dd yyyy HH:MM:ss",
    shortDate: "m/d/yy",
    mediumDate: "mmm d, yyyy",
    longDate: "mmmm d, yyyy",
    fullDate: "dddd, mmmm d, yyyy",
    shortTime: "h:MM TT",
    mediumTime: "h:MM:ss TT",
    longTime: "h:MM:ss TT Z",
    isoDate: "yyyy-mm-dd",
    isoTime: "HH:MM:ss",
    isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Minngu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ]
};

// For convenience...
Date.prototype.format = function(mask, utc) {
    return dateFormat(this, mask, utc);
};

// dateFormat(v.jadujidetail_starttime,'dd mmmm, yyyy')