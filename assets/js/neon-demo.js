"undefined"!=typeof Dropzone&&(Dropzone.autoDiscover=!1),function(e,s,d){"use strict";e(document).ready(function(){if("undefined"!=typeof Dropzone&&e("#dropzone_example").length){var s=new Dropzone("#dropzone_example"),d=e("#dze_info"),n={uploaded:0,errors:0},a=e('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');s.on("success",function(e){var s=a.clone();d.removeClass("hidden"),s.addClass("success"),s.find(".name").html(e.name),s.find(".size").html(parseInt(e.size/1024,10)+" KB"),s.find(".type").html(e.type),s.find(".status").html('Uploaded <i class="entypo-check"></i>'),d.find("tbody").append(s),n.uploaded++,d.find("tfoot td").html('<span class="label label-success">'+n.uploaded+' uploaded</span> <span class="label label-danger">'+n.errors+" not uploaded</span>")}).on("error",function(e){var s=a.clone();d.removeClass("hidden"),s.addClass("danger"),s.find(".name").html(e.name),s.find(".size").html(parseInt(e.size/1024,10)+" KB"),s.find(".type").html(e.type),s.find(".status").html('Uploaded <i class="entypo-cancel"></i>'),d.find("tbody").append(s),n.errors++,d.find("tfoot td").html('<span class="label label-success">'+n.uploaded+' uploaded</span> <span class="label label-danger">'+n.errors+" not uploaded</span>")})}})}(jQuery,window);