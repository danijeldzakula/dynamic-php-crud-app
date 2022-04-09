<main class="main">
    <section class="section section-dashboard">
        <!-- Header page title -->
        <div class="container">
            <h1 class="font-thin text-center">Pozicije</h1>   
            <hr class="hr"/>
        </div>
        <!-- Content of page (dashboard) -->
        <div class="container mt-4">
            <!-- sql sum of all employes - SELECT count(staff_id) AS position_number, position FROM zaposleni JOIN pozicije ON zaposleni.staff_id = pozicije.pozicije_id;-->
            <div class="thumbnails">
                <p>Ukupan broj zaposlenih u komaniji: <span class="c-red font-bold bg-red-100 rounded-sm min-w-3 min-h-3 p-2"><?= array_sum(array_map(fn ($item) => $item['position_number'], $db_info)); ?></span></p>
                <p>Prosecna plata u komaniji: 
                    <span class="c-red font-bold bg-red-100 rounded-sm min-w-3 min-h-3 p-2">
                        <?php 
                            $salary_length = count($db_staff);
                            $salary_sum = array_sum(array_map(fn ($item) => $item['staff_payment'], $db_staff));
                            $salaray_average = $salary_sum / $salary_length;
                            echo $salaray_average.' RSD';
                        ?>
                    </span>
                </p>
                <p>Raspored broja zaposlenih po pozicijama:</p>
                <hr class="hr" />
                <ul class="list grid gap-2">
                    <?php foreach($db_info as $key => $value): ?>
                        <li class="grid two-columns-full-auto gap-2">
                            <span class="text-capitalize">- <?= $value['position'];?></span>
                            <span class="grid place-items-center c-red font-bold bg-red-100 rounded-sm min-w-2 min-h-2"><?= $value['position_number'];?></span>
                        </li>                     
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</main>