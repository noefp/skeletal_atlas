<h3 class=" text-center fw-bold text-black">Mouse Osteogenesis Imperfecta — Col1a1 Aga2/+</h3>
<span class="px-3 text-muted text-uppercase">Species:</span><span class=" text-center badge text-primary border px-2">mouse</span><br>

<div class=" p-3 ">
            <h4 class="text-uppercase text-muted fw-bold small mb-1 text-black">Dataset Context</h4>
            <p class="mb-0 text-dark">
            Single-cell dataset from the Col1a1 Aga2/+ mouse model, focused on growth plate and perichondrial alterations in Osteogenesis Imperfecta.
            </p>
            </div>
 
<?php $dataset = [
'cell_types'  => [
                'Articular',
                'Precartilage',
                'Resting',
                'Proliferative',
                'Pre-hypertrophic and hypertrophic chondrocytes',
                'Perichondrial cells', 
                'Pericyte/endothelial cells and platelets'
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