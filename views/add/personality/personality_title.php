<!--
    Authors: Noah Lanctot, Lois Lanctot
    File: personality_title.php
    Description: Create a personality quiz
-->
<include href="views/header.html"></include>

<!-- Main Content -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="create">
            <h1>Create Personality Quiz</h1><hr>

            <!-- Personality Quiz Form -->
            <form action="#" method="post">
                <div class="row">
                    <div class="form-group col-4">
                        <!-- Quiz Title -->
                        <div class="form-group">
                            <label for="title" class="bold col-sm-4 control-label">Quiz Title</label>
                            <input class="form-control" type="text" name="title" id="title" value="">
                        </div>

                        <!-- Button to Submit -->
                        <button class="rounded-3" type="submit">Next</button>
                    </div>

                    <!-- Textarea for Quiz Description -->
                    <div class="form-group col-8">
                        <label for="desc" class="bold control-label">Description</label>
                        <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>