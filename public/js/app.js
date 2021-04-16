(function () {
    jQuery('.category-list').click(function (e) {
        let categoryId = parseInt(jQuery(e.target).data('category-id')),
            a = jQuery(e.target).find('a').eq(0);

        if (categoryId) {
            displayCategoryBookmarks(categoryId);
            toggleCategoryActiveClass(a);
        }

        $([document.documentElement, document.body]).animate({
            scrollTop: $("#bookmark-wrapper").offset().top
        }, 1500);
    });

    jQuery('.category-list .category-link').click(function (e) {
        let li = jQuery(this).closest('li'),
            categoryId = parseInt(li.data('category-id'));

        if (categoryId) {
            displayCategoryBookmarks(categoryId);
            toggleCategoryActiveClass(jQuery(this));
        }
    });

    jQuery('#bookmark-wrapper').on('click', '.fa-minus', function (e) {
        e.preventDefault();
        let tr = jQuery(this).closest('tr'),
            bookmarkId = tr.data('bookmark-id');
        removeBookmark(bookmarkId, tr);
    });

    jQuery('.category-list .fa-minus').click(function (e) {
        e.preventDefault();
        let li = jQuery(this).closest('li'),
            categoryId = parseInt(li.data('category-id')),
            url = jQuery(this).closest('a').attr('href');
        removeCategory(categoryId, url, li);
    });

    jQuery('.category-list .badge-danger').click(function (e) {
        e.preventDefault();
    });
}());

function toggleCategoryActiveClass(a) {
    $('.list-group a.active').removeClass('active');
    a.addClass('active');
}

/**
 * Remove category,
 *
 * @param categoryId
 * @param url
 * @param li
 */
function removeCategory(categoryId, url, li) {
    let _token = jQuery('meta[name="csrf-token"]').attr('content');

    jQuery.ajax({
        url: url,
        type: "DELETE",
        data: {
            _token: _token,
            id: categoryId
        },
        success: function(response) {
            jQuery('.alert-success:first').attr('style', 'display: block !important');
            jQuery('.alert-success:first strong').text(response.message);
            li.remove();
        },
        error: function(data) {
            jQuery('.alert-danger:first').attr('style', 'display: block !important');
            jQuery('.alert-danger:first strong').text(data['responseJSON']['message']);
        }
    });
}

/**
 * Remove bookmark.
 *
 * @param bookmarkId
 * @param tr
 */
function removeBookmark(bookmarkId, tr) {
    let _url   = `/bookmark/`+ bookmarkId;
    let _token   = jQuery('meta[name="csrf-token"]').attr('content');

    jQuery.ajax({
        url: _url,
        type: "DELETE",
        data: {
            _token: _token,
            id: bookmarkId
        },
        success: function(response) {
            jQuery('.alert-success:first').attr('style', 'display: block !important');
            jQuery('.alert-success:first strong').text(response.message);
            tr.remove();
        },
        error: function(data) {
            jQuery('.alert-danger:first').attr('style', 'display: block !important');
            jQuery('.alert-danger:first strong').text(data['responseJSON']['message']);
        }
    });
}

/**
 * Display bookmarks for certain category
 *
 * @param categoryId
 */
function displayCategoryBookmarks(categoryId) {
    let _url   = `/bookmark`;
    let _token   = jQuery('meta[name="csrf-token"]').attr('content');

    jQuery.ajax({
        url: _url,
        type: "GET",
        data: {
            categoryId: categoryId,
            _token: _token
        },
        success: function(response) {
            jQuery('#bookmark-wrapper').html(response.html);
        }
    });
}
