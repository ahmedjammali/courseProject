<?php include 'navbar.php'; ?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/controllers/courseDetail.php';

// Create the controller instance
$controller = new CourseDController();

// Call the index method to display courses
$data=$controller->courseDetail();


$course = $data['course'];
$instructor = $data['instructor'];


require_once '../app/controllers/CommentsController.php';
$commentController = new CommentController();
    
    // Get comments for the course
$comments = $commentController->getCommentsForCourse();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_text'])) {
    $commentController->addComment(); // Adding the comment
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> - Course Details</title>
    <link rel="stylesheet" href="style/courseD.css"> <!-- Add your CSS file -->
</head>
<body>

<div class="course-detail-container">
    <div class="instructor-photo-container">
	<img src="<?php echo htmlspecialchars($course['path']); ?>" alt="<?php echo htmlspecialchars($course['course_name']); ?>" class="instructor-photo">
        <!-- Instructor Info -->
    </div>
    <div class="course-description-container">
        <!-- Display the course name -->
		<h1 class="course-title"><?php echo htmlspecialchars($course['course_name']); ?></h1>

<!-- Display course description -->
<p class="course-description">
	<?php echo nl2br(htmlspecialchars($course['course_description'])); ?>
</p>


        <!-- Star Rating Section moved here -->
        <h1>Rate This Experience </h1>
        <form class="rating">
	<div class="rating__stars">
		<input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
		<input id="rating-2" class="rating__input rating__input-2" type="radio" name="rating" value="2">
		<input id="rating-3" class="rating__input rating__input-3" type="radio" name="rating" value="3">
		<input id="rating-4" class="rating__input rating__input-4" type="radio" name="rating" value="4">
		<input id="rating-5" class="rating__input rating__input-5" type="radio" name="rating" value="5">
		<label class="rating__label" for="rating-1">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">1 star—Terrible</span>
		</label>
		<label class="rating__label" for="rating-2">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">2 stars—Bad</span>
		</label>
		<label class="rating__label" for="rating-3">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">3 stars—OK</span>
		</label>
		<label class="rating__label" for="rating-4">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">4 stars—Good</span>
		</label>
		<label class="rating__label" for="rating-5">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">5 stars—Excellent</span>
		</label>
		<p class="rating__display" data-rating="1" hidden>Terrible</p>
		<p class="rating__display" data-rating="2" hidden>Bad</p>
		<p class="rating__display" data-rating="3" hidden>OK</p>
		<p class="rating__display" data-rating="4" hidden>Good</p>
		<p class="rating__display" data-rating="5" hidden>Excellent</p>
	</div>
    </form>
    </div>
</div>

<div class="comment-section" style="width: 76%; margin: 0 auto;">
    <h2>SHARE YOUR EXPERIENCE</h2>
    <div class="comments-container">
	<?php if (!empty($comments)): ?>
            <div class="comment-column">
                <?php foreach ($comments as $index => $comment): ?>
                    <div class="comment">
                        <p class="comment-author"><?php echo htmlspecialchars($comment['prenom'] . ' ' . htmlspecialchars($comment['nom'])); ?></p>
                        <p class="comment-date"><?php echo date('F j, Y', strtotime($comment['created_at'])); ?></p>
                        <p class="comment-content"><?php echo htmlspecialchars($comment['comment_text']); ?></p>
                    </div>
                    <?php if ($index % 2 === 1): // After every 2 comments, start a new column ?>
                        </div><div class="comment-column">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No comments YET !</p>
        <?php endif; ?>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
    <div class="leave-comment">
        <h3>Your comment</h3>
        <form method="POST" action="">
            <textarea name="comment_text" placeholder="Leave Your comment .. !" rows="4"></textarea>
            <input type="hidden" name="course_id" value="<?php echo $courseId; ?>">
            <button type="submit" class="submit-comment-button">Send</button>
        </form>
    </div>
<?php else: ?>
<?php endif; ?>
</div>


<footer>
    <p>&copy; 2024 Course Selling Website</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- Include jQuery -->
<script>
    window.addEventListener("DOMContentLoaded",() => {
	const starRating = new StarRating("form");
});

class StarRating {
	constructor(qs) {
		this.ratings = [
			{id: 1, name: "Terrible"},
			{id: 2, name: "Bad"},
			{id: 3, name: "OK"},
			{id: 4, name: "Good"},
			{id: 5, name: "Excellent"}
		];
		this.rating = null;
		this.el = document.querySelector(qs);

		this.init();
	}
	init() {
		this.el?.addEventListener("change",this.updateRating.bind(this));

		// stop Firefox from preserving form data between refreshes
		try {
			this.el?.reset();
		} catch (err) {
			console.error("Element isn’t a form.");
		}
	}
	updateRating(e) {
		// clear animation delays
		Array.from(this.el.querySelectorAll(`[for*="rating"]`)).forEach(el => {
			el.className = "rating__label";
		});

		const ratingObject = this.ratings.find(r => r.id === +e.target.value);
		const prevRatingID = this.rating?.id || 0;

		let delay = 0;
		this.rating = ratingObject;
		this.ratings.forEach(rating => {
			const { id } = rating;

			// add the delays
			const ratingLabel = this.el.querySelector(`[for="rating-${id}"]`);

			if (id > prevRatingID + 1 && id <= this.rating.id) {
				++delay;
				ratingLabel.classList.add(`rating__label--delay${delay}`);
			}

			// hide ratings to not read, show the one to read
			const ratingTextEl = this.el.querySelector(`[data-rating="${id}"]`);

			if (this.rating.id !== id)
				ratingTextEl.setAttribute("hidden",true);
			else
				ratingTextEl.removeAttribute("hidden");
		});
	}
}
</script>
</body>
</html>
