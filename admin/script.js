$(document).ready(function (event) {
    //Render the icons to DOM, also accepts search query params
    function renderIcons(searchQuery = '') {
        $.getJSON("../oc-content/plugins/fk_fontawesome_category_icons/fontawesome-icons.json", function (data) {
            let tr = ['<tr>'];
            let count = 0;
            let icons = data.icons.filter(function (el) {
                return el.toLowerCase().indexOf(searchQuery.toLowerCase()) > -1;
            });
            icons.forEach(y => {
                if (count == 5) {
                    let item = `<td>
                        <button class="btn icon-select" data-value="${y}">
                        <i class="${y}"></i>
                        </button>
                        </td>
                        </tr>`;
                    tr.push(item);
                    count = 0;
                } else {
                    let item = `<td>
                        <button class="btn icon-select" data-value="${y}">
                        <i class="${y}"></i>
                        </button>
                        </td>`;
                    tr.push(item);
                    count++;
                }
            });

            $('#icons-data').html(tr.join(''));

            $('.icon-select').click(function (e) {
                //change main icon
                let activeButton = $('.active');
                let icon = activeButton.find('#main-icon');
                icon.removeClass(icon.attr('class'));
                icon.addClass(e.currentTarget.dataset.value);

                //input value
                activeButton.find('#icon-input').attr('value', e.currentTarget.dataset.value);

                //reset dropdown
                resetView();
            });
        });
    };

    //event listeners
    $('.iconpicker').click(function (e) {

        resetView();
        $(this).addClass('active');
        let offset = $(this).offset();
        $('#icons-dropdown').css({ "top": offset.top - 73 + "px", "left": offset.left - 91 + "px" });

        e.preventDefault();
    });

    $('#color-picker').on('change', function (e) {

        let colorValue = $(this).attr('value');
        let activeButton = $('.active');

        activeButton.find('#main-icon').css('color', colorValue);
        activeButton.find('#icon-color-input').attr('value', colorValue);
        resetView();

    });

    //filter function
    $('#icons-search').on('keyup', function () {
        renderIcons($(this).val());
    })

    //reset view / close dropdown
    function resetView() {
        //reset dropdown
        $('.iconpicker').removeClass('active');
        $('#icons-dropdown').toggleClass('show');
    }


    //init
    renderIcons();
});