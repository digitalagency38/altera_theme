function getPostByTag(tag, load_count, all_count, post_type){
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: {
            slug: tag,
            load_count: load_count,
            action: 'post_by_tag',
        },
        type: 'POST',
        success: function (res) {
            let data = JSON.parse(res);
            drawPostByTag(data, tag, load_count, all_count, post_type);
        },
        error: function (res) {
            console.log(res, 'err')
        }
    });
}

function drawPostByTag(data, tag, load_count, all_count, post_type) {
    let list = '';

    let btn = `
        <section class="container">
            <div class="button button_show-more"
                 onclick="showMorePost(${load_count}, ${all_count}, '${post_type}', '${tag}')"
            >
                Показать еще
            </div>
        </section>
    `;

    data.map(item => {
        list += `
            <a href="${item.guid}" class="item" itemid="${item.id}">
                <div class="img"><img src="${item.img}" alt="#"></div>
                <div class="text">
                    <div class="title">${item.title}</div>
                    <div class="short_desc">${item.excerpt}</div>
                </div>
            </a>
        `
    });
    $('.projects--list').html(list);
    $('.portfolio_btn_section--hide').css('display', 'none');
    $('.portfolio_btn_section').html(btn);
}

function changeTitle(name, event) {
    $('.side-bar--list ul li').each(function () {
        $(this).removeClass("active-tag");
    });
    $(event.target).addClass("active-tag");
    let title = name.length > 0 ? '('+name+')' : '';
    $('.projects--title span').text(title);
}

function showMorePost(load_count, all_count, post_type, slug = null) {
    let showMoreBtn = $('.button_show-more');
    let itemIds = document.querySelectorAll('[itemId]');
    let ids = [];
    Object.keys(itemIds).map(function (key) {
        let id = itemIds[key].getAttribute('itemId');
        ids.push(id);
    });

    showMoreBtn.text('Загружаю ...');

    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: {
            ids: ids.join(','),
            load_count: load_count,
            post_type: post_type,
            slug: slug,
            action: 'show_more_post',
        },
        type: 'POST',
        success: function (res) {
            let data = JSON.parse(res);

            drawMorePost(post_type, data);

            showMoreBtn.text('Показать еще');

            if(parseInt(ids.length)+parseInt(load_count) >= parseInt(all_count)){
                showMoreBtn.css('display', 'none');
            }
        },
        error: function (res) {
            console.log(res, 'err')
        }
    });
}

function drawMorePost(post_type, data) {
    let list = '';

    if(post_type === 'post_blog'){
        data.map(item => {
            list += `
                <div class="item" itemid="${item.id}">
					<div class="img"><img src="${item.img}" alt="#"></div>
					<div class="description">${item.excerpt}</div>
					<div class="btn"><a href="${item.guid}" class="button">Перейти</a></div>
				</div>
            `
        });
    }else{
        data.map(item => {
            list += `
				<a href="${item.guid}" class="item" itemid="${item.id}">
                    <div class="img"><img src="${item.img}" alt="#"></div>
                    <div class="text">
                        <div class="title">${item.title}</div>
                        <div class="short_desc">${item.excerpt}</div>
                    </div>
                </a>
            `
        });
    }
    $('.more-box').append(list);
}

function getSubTotalSum() {
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: {
            action: 'get_sub_total',
        },
        type: 'POST',
        success: function (res) {
            $('.cart_count').text(res + '₽');
        },
        error: function (res) {
            console.log(res, 'err')
        }
    });
}