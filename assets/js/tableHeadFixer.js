!function(t){t.fn.tableHeadFixer=function(n){return this.each(function(){(function(){{var o=t.extend({},{head:!0,foot:!1,left:0,right:0,"z-index":0},n);function i(n){n.each(function(n,o){var o=t(o),i=t(o).parent(),r=o.css("background-color");r="transparent"==r||"rgba(0, 0, 0, 0)"==r?null:r;var e=i.css("background-color"),a=(e="transparent"==e||"rgba(0, 0, 0, 0)"==e?null:e)||"white";a=r||a,o.css("background-color",a)})}function r(n,i){for(var r=o.left,e=1,a=1;a<=r;a+=e){var c=e>1?a-1:a,f=t(n).find("> *:nth-child("+c+")"),l=f.prop("colspan");f.cellPos().left<r&&i(f),e=l}}function e(n,i){for(var r=o.right,e=1,a=1;a<=r;a+=e){var c=e>1?a-1:a,f=t(n).find("> *:nth-last-child("+c+")"),l=f.prop("colspan");i(f),e=l}}o.table=this,o.parent=t(o.table).parent(),f=t(o.parent),l=t(o.table),f.append(l),f.css({"overflow-x":"auto","overflow-y":"auto"}),f.scroll(function(){var t=f[0].scrollWidth,n=f[0].clientWidth,i=f[0].scrollHeight,r=f[0].clientHeight,e=f.scrollTop(),a=f.scrollLeft();o.head&&this.find("thead tr > *").css("top",e),o.foot&&this.find("tfoot tr > *").css("bottom",i-r-e),o.left>0&&o.leftColumns.css("left",a),o.right>0&&o.rightColumns.css("right",t-n-a)}.bind(l)),1==o.head&&((a=t(o.table).find("thead")).find("tr"),i(c=a.find("tr > *")),c.css({position:"relative"})),1==o.foot&&function(){var n=t(o.table).find("tfoot"),r=(n.find("tr"),n.find("tr > *"));i(r),r.css({position:"relative"})}(),o.left>0&&function(){var n=t(o.table);o.leftColumns=t(),n.find("tr").each(function(t,n){r(n,function(t){o.leftColumns=o.leftColumns.add(t)})}),o.leftColumns.each(function(n,o){var o=t(o);i(o),o.css({position:"relative"})})}(),o.right>0&&function(){var n=t(o.table);o.right;o.rightColumns=t(),n.find("tr").each(function(t,n){e(n,function(t){o.rightColumns=o.rightColumns.add(t)})}),o.rightColumns.each(function(n,o){var o=t(o);i(o),o.css({position:"relative"})})}(),function(){var n=t(o.table);if(o.head){if(o.left>0){var i=n.find("thead tr");i.each(function(n,i){r(i,function(n){t(n).css("z-index",o["z-index"]+1)})})}if(o.right>0){var i=n.find("thead tr");i.each(function(n,i){e(i,function(n){t(n).css("z-index",o["z-index"]+1)})})}}if(o.foot){if(o.left>0){var i=n.find("tfoot tr");i.each(function(n,i){r(i,function(n){t(n).css("z-index",o["z-index"])})})}if(o.right>0){var i=n.find("tfoot tr");i.each(function(n,i){e(i,function(n){t(n).css("z-index",o["z-index"])})})}}}(),t(o.parent).trigger("scroll"),t(window).resize(function(){t(o.parent).trigger("scroll")})}var a,c;var f,l}).call(this)})}}(jQuery),function(t){t.fn.cellPos=function(n){var o=this.first(),i=o.data("cellPos");i&&!n||function(n){var o=[];n.children("tr").each(function(n,i){t(i).children("td, th").each(function(i,r){var e,a,c=t(r),f=0|c.attr("colspan"),l=0|c.attr("rowspan");for(f=f||1,l=l||1;o[n]&&o[n][i];++i);for(e=i;e<i+f;++e)for(a=n;a<n+l;++a)o[a]||(o[a]=[]),o[a][e]=!0;var s={top:n,left:i};c.data("cellPos",s)})})}(o.closest("table, thead, tbody, tfoot"));return i=o.data("cellPos")}}(jQuery);