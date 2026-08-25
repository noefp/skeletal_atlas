<h3 class=" text-center fw-bold text-black">Mouse skeletal reference atlas</h3>
<span class="px-3 text-muted text-uppercase">Species:</span><span class=" text-center badge text-primary border px-2">mouse</span><br>

<div class=" p-3 ">
            <h4 class="text-uppercase text-muted fw-bold small mb-1 text-black">Dataset Context</h4>
            <p class="mb-0 text-dark">
            Integrated mouse skeletal single-cell reference atlas covering major skeletal and marrow-associated compartments.
            </p>
            </div>
 
<?php $dataset = [
'cell_types'  => [
        'Osteoblasts',
        'Osteocytes',
        'Chondrocytes',
        'Stromal progenitors',
        'Marrow-associated stromal cells',
        'Vascular/perivascular cells',
        'Immune cells',
        'Muscle-associated populations' 

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