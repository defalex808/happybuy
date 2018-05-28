﻿<link href="../Content/media.css" rel="stylesheet"/>


<main>
    <div class="sort">
        <div class="location" >
            <div class="title">
                <div class="title-head">Розташування</div>
                <div class="icon-arrow"></div>
            </div>
            <form id="locationForm">
                <?php
                foreach ($districts as $district) {
                    $district->ToHtml();
                } ?>
            </form>
        </div>

        <div class="count-place">
            <div class="title">
                <div class="title-head">Кількість спальних місць</div>
                <div class="icon-arrow"></div>
            </div>

            <?php
            foreach ($rooms as $room) {
                $room->ToHtml();
            } ?>

        </div>
    </div>

    <div class="main">
        <h1>Квартири</h1>
        <div class="searching-panel">
            <div class="choosed">1 кімната <a href="#">
                    <div class="close"></div>
                </a></div>
            <a href="#">
                <div class="clear-search">Скинути</div>
            </a>
        </div>
        <hr/>

        <div class="row" id="apartments">
            <?php
            foreach ($items as $item) {
                $item->ToHtml();
            }

            ?>

            <div class="center">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>

    <div class="new-houses">
        <span>Найновітніші житлові комплекси Києва</span>
        <div class="building">
            <img src="../../images/bud1.png"/>
            <div class="discription-build">ЖК «Сучасник» <br/>р-н Солом’янський,<br/> вул. Борщагівська 7</div>
            <div class="down-building">
                <div class="count-building">від 16000 грн</div>
                <div class="more-info"><a href="#">Подробніше --></a></div>
            </div>
        </div>
        <div class="building">
            <img src="../../images/bud2.png"/>
            <div class="discription-build">ЖК «Зірка» <br/>р-н Солом’янський,<br/> вул. Борщагівська 7</div>
            <div class="down-building">
                <div class="count-building">від 16000 грн</div>
                <div class="more-info"><a href="#">Подробніше --></a></div>
            </div>

        </div>
        <div>

        </div>
    </div>

</main>
<script>

    function loadByLocation() {
        $.ajax({
            type: 'GET',
            url: '/main',
            data: $("#locationForm").serialize(),
            success: function (data, textstatus) {
                console.log(data);
                $("#apartments").html("").append(data);
            }
        });
    }
</script>
