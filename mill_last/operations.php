<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h3>إدارة العمليات</h3>
    <form id="operationForm" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="supervisor_id" class="form-control" required>
                    <option value="">اختر مشرف</option>
                    <?php foreach($pdo->query("SELECT id, name FROM employees WHERE role='مشرف'") as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <select name="mill_ids[]" class="form-control" multiple required>
                    <?php foreach($pdo->query("SELECT id, mill_number FROM mills") as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['mill_number'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" name="total_sacks" class="form-control" placeholder="العدد الكلي للشوالات" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">بدء العملية</button>
    </form>

    <div id="activeOperations">
        <?php foreach($pdo->query("SELECT * FROM operations WHERE end_time IS NULL") as $row): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">عملية #<?= $row['id'] ?></h5>
                <div class="row">
                    <div class="col-md-4">
                        <p>المشرف: <?= $pdo->query("SELECT name FROM employees WHERE id={$row['supervisor_id']}")->fetchColumn() ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>الشوالات: <?= $row['total_sacks'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <div class="progress" style="height: 30px;">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" id="progress<?= $row['id'] ?>">0%</div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger stop-btn mt-2" data-id="<?= $row['id'] ?>">إيقاف العملية</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
$(document).ready(function() {
    function updateProgress() {
        $('.progress-bar').each(function() {
            const progressBar = $(this);
            const operationId = progressBar.closest('.card').find('.stop-btn').data('id');
            
            $.get('get_progress.php', {id: operationId}, function(data) {
                const progress = data.progress;
                progressBar.css('width', progress + '%').text(progress + '%');
            });
        });
    }

    setInterval(updateProgress, 1000);

    $('#operationForm').on('submit', function(e) {
        e.preventDefault();
        $.post('process_operation.php', $(this).serialize(), function(response) {
            location.reload();
        });
    });

    $('.stop-btn').on('click', function() {
        if(confirm('هل أنت متأكد من إيقاف العملية؟')) {
            const operationId = $(this).data('id');
            $.post('stop_operation.php', {id: operationId}, function() {
                location.reload();
            });
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>