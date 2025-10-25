<div class="modal fade" id="edit-record-common">
	<div class="modal-dialog modal-md modal-outline">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit data xxx</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<script>
	function editModal(table_name, id, size_class = '') {
		console.log(size_class)
		$.ajax({
			url: 'handler/by_id/' + table_name + '/' + id, // *** CHANGE THIS TO YOUR SERVER URL ***
			success: function (res) {
				if (res.status === 'success') {

					let e1 = "#edit-record-common"
					$(e1).appendTo('body').modal('show')
					$('body>' + e1 + ' div.modal-dialog.modal-outline').removeClass('modal-lg modal-md')
					$('body>' + e1 + ' div.modal-dialog.modal-outline').addClass(size_class)
					$(e1 + ' .modal-body').html($('#form-' + table_name).html())
					$(e1 + ' .modal-title').html("Edit data " + table_name)

					let d = res.data
					$(e1 + ' input[name], ' + e1 + ' select[name], ' + e1 + ' textarea[name]').each((i, e) => {
						if (e.className.indexOf('summernote') > -1) {
							$(e1 + ' textarea.summernote').first().next().remove()
							$(e).summernote('code', d[e.name]);
							// $(e).val(d[e.name]); // Set value on the original textarea
							// $(e).summernote({
							// 	// height: 200
							// });
							// console.log("summernode set val detect")
							// $(e).summernote('code', d[e.name]);
							// $(e).summernote('code', 'ccsss');


						}
						else {
							$(e).val(d[e.name]);

						}
						console.log('----------------------')
						console.log(e.name)
						console.log(e.className)
						console.log(d[e.name])


						$(e).css('border-bottom', "1px solid #99f")
					});
				}
			},
		});
	}
</script>


<div class="modal fade" id="ubah-status-common-res">
	<div class="modal-dialog modal-md modal-outline">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Perubahan Status Berhasil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<span id="msg1">
					xxxxxxxxxxx xxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
				</span>
				<p>
				<div class="modal-footer pull-right">
					<button type="button" class="btn btn-info" data-dismiss="modal">Oke</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>

<script>
	let lsPrefLayout = "pageLayout-"
	let page_name = "x"

	document.addEventListener('DOMContentLoaded', function () {
		if (localStorage.getItem("auto_reload_do") === "1") {
			localStorage.removeItem("auto_reload_do")
			$("#status1").html("auto reload done")
			setTimeout(() => {
				$("#status1").html("")
			}, 1000);
		}


		page_name = lsPrefLayout + $(".content-header h1").first().text().trim() + "-";
		// console.log(page_name)
		// let lastParent = null;
		for (card of $(".card.card-info.card-outline ")) {
			let title_ = $(card).find('.card-title').first();
			let title = title_.text()?.trim();
			let state = localStorage.getItem(page_name + title) === null ? "-" : localStorage.getItem(page_name + title);
			let button = $(card).find('button').eq(1).find('i').first();

			let lsKeyCollapsed = page_name + title + '-collapsed'
			let lsKeyMaxed = page_name + title + '-maxed'

			let collap = localStorage.getItem(lsKeyCollapsed) === null ? 1 : localStorage.getItem(lsKeyCollapsed);
			let maxed = localStorage.getItem(lsKeyMaxed) === null ? 0 : localStorage.getItem(lsKeyMaxed);

			if (collap == 1) {
				// console.log("collap1:"+collap)
				$(card).addClass("collapsed-card");
				button.removeClass('fa-minus').addClass('fa-plus');
			}
			else {
				$(card).removeClass("collapsed-card");
				button.removeClass('fa-plus').addClass('fa-minus');
			}

			if (maxed == 1) {
				let btnfs = $(card).find('.card-tools button').first();
				setTimeout(() => {
					btnfs.click()
				}, 200);
			}
		}


		$(".card-outline button, .card-outline div.card-header").click(function (e) {
			if (e.currentTarget.tagName.toLowerCase() == 'button') return
			// log1("div.card-header")
			// log1($(e.currentTarget).tagName)
			console.log($(e.currentTarget))
			let cards = $(this).parents('.card').first();
			let that = this
			setTimeout(() => {
				let title_ = $(that).parent().siblings('.card-title').first();
				if (title_.length === 0) {
					title_ = $(that).find('.card-title').first();
				}
				let title = title_?.text().trim()

				let page_name_title = page_name + title + "-collapsed"
				if ($(cards[0]).hasClass('collapsed-card')) {
					localStorage.setItem(page_name_title, 1);
				} else {
					localStorage.setItem(page_name_title, 0);
				}
			}, 500);
		});

		$(".btn-fs").click((e) => {
			let title_ = $(e.currentTarget).parent().siblings('.card-title').first()
			let title = title_.text()?.trim()
			// log1(title_)
			let lsKeyMaxed = page_name + title + "-maxed";
			// log1(lsKeyMaxed)

			let fTxt = $(e.currentTarget).html().trim()
			// log1("fTxt-----"+fTxt)

			let target1 = $(e.currentTarget).parents("div.row div:has(> .card-info)").first();
			// // target1.addClass("col-lg-12")
			// log1("target1")
			// log1(target1)
			if (fTxt === "]&nbsp;[") { // max opened
				// target1.removeClass("col-lg-12")
				$(e.currentTarget).html("[&nbsp;&nbsp;]")
				localStorage.setItem(lsKeyMaxed, 0);
			} else if (fTxt === "[&nbsp;&nbsp;]") { // max closed
				// target1.addClass("col-lg-12")
				$(e.currentTarget).html("]&nbsp;[")
				localStorage.setItem(lsKeyMaxed, 1);
			}

			target1.toggleClass("col-lg-12")
			log1("target1--------")
			console.log(target1)

			// if closed card then open
			$tgtChild1 = $(target1).children(':first')
			if ($tgtChild1.hasClass("collapsed-card")) {
				
				setTimeout(() => {
					$tgtChild1.toggleClass("collapsed-card")
				}, 2000);

			}

			e.preventDefault()
			e.stopPropagation()

			const topPosition = target1.offset().top;
			// $('html, body').animate({
			// 	scrollTop: topPosition // Scroll to the element's position
			// }, 800);
			// $(target1).find('input').first().focus()
			return false
		});

		$("#relayoutPage").click(function (e) {
			let keysToRemove = [];
			// log1("scan1:" + page_name)
			for (let i = 0; i < localStorage.length; i++) {
				let key = localStorage.key(i);
				log1(key)
				if (key && key.startsWith(page_name)) {
					log1("remove " + key)
					keysToRemove.push(key);
				}
			}
			keysToRemove.forEach(key => localStorage.removeItem(key));
			setTimeout(() => {
				location.reload();
			}, 200);

		})


	})


	function log1(s) {
		if (!isObject(s)) {
			console.log("Log1 " + (Date.now() + "").substring(9) + "|" + s + "|")
		}
		else {
			console.log("Log1 " + (Date.now() + "").substring(9) + "-------")
			console.log(s)
		}

	}

	function isObject(value) {
		return value !== null && typeof value === 'object' && Object.prototype.toString.call(value) === '[object Object]';
	}

	window.onfocus = function () {
		// get auto_reload localStorage value
		var autoReload = localStorage.getItem("auto_reload");
		if (autoReload === "1") {
			localStorage.setItem("auto_reload_do", 1);
			location.reload();

		}
	};
</script>

<script src="assets/AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		$('.summernote').summernote();
	});
</script>
</body>

</html>