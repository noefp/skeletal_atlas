<h3 class=" text-center fw-bold text-black">Human Skeletal Reference Atlas</h3>
<span class="px-3 text-uppercase text-muted">Species:</span><span class=" text-center badge text-primary border px-2">Human</span><br>

<div class=" p-3 ">
            <h4 class="text-uppercase text-muted fw-bold small mb-1 text-black">Dataset Context</h4>
            <p class="mb-0 text-dark">
                Developmental skeletal single-cell/single-nucleus reference atlas derived from the Human Developmental Cell Atlas skeletal dataset.
            </p>
        </div>

<?php $dataset = [
'cell_types'  => [
        'Osteogenic',
        'Chondrogenic',
        'Articular/interzone-associated',
        'Vascular',
        'Muscle-associated',
        'Dermal',
        'Synovial',
        'Tendon-associated and percursor cell states'

    ]
];?>


<div>
            <h6 class="text-uppercase text-muted fw-bold small mb-2 px-3">Main Annotated Cell Types / cell states included</h6>
            <div class="d-flex flex-wrap gap-2 px-3">
                <?php foreach ($dataset['cell_types'] as $cell): ?>
                    <span class="badge badge-info mr-1 mb-1">
                        <?= htmlspecialchars($cell) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>