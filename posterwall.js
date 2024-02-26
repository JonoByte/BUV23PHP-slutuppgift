document.getElementById('postForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    // Gather the data from the form
    var postData = {
        content: document.getElementById('post-content').value,
        reviewLink: document.getElementById('review-link').value
    };

    // Add the post to the page
    addPost(postData);

    // Reset the form fields for the next post
    document.getElementById('post-content').value = '';
    document.getElementById('review-link').value = '';
});

function addPost(data) {
    var postsContainer = document.getElementById('postsContainer');

    // Create the container for the new post
    var postDiv = document.createElement('div');
    postDiv.classList.add('post');

    // Add the main content of the post
    var postContent = document.createElement('p');
    postContent.textContent = data.content;
    postDiv.appendChild(postContent);

    // If there's a review link, add it
    if (data.reviewLink) {
        var reviewLink = document.createElement('a');
        reviewLink.textContent = 'Review Link';
        reviewLink.href = data.reviewLink;
        postDiv.appendChild(reviewLink);
    }

    // Create and add a "Comment" button specific to this post
    var commentButton = document.createElement('button');
    commentButton.textContent = 'Comment';
    commentButton.type = 'button';
    commentButton.onclick = function() { toggleCommentPopup(); };
    postDiv.appendChild(commentButton);

    // Add the whole post to the posts container
    postsContainer.appendChild(postDiv);

    commentButton.onclick = function() {

        // Store reference to the current post in a global variable or through another method
        window.currentPost = postDiv;
        toggleCommentPopup();
        
    }
}

// This function toggles the visibility of the comment popup
function toggleCommentPopup() {
    var popup = document.getElementById("commentPopup");
    popup.style.display = (popup.style.display === "none" || popup.style.display === "") ? "flex" : "none";
}

// Assuming a function for submitting comments (you might need to adjust this)
function submitComment() {
    var commentText = document.querySelector('#commentPopup textarea[name="comment"]').value;

    if (!commentText.trim()) {
        alert('Please enter a comment.');
        return;
    }

    // Assuming window.currentPost is the post being commented on
    var commentDiv = document.createElement('div');
    commentDiv.classList.add('comment');
    commentDiv.textContent = commentText;
    
    // Append the comment to the currentPost
    window.currentPost.appendChild(commentDiv);

    // Close the popup and clear the textarea
    toggleCommentPopup();
    document.querySelector('#commentPopup textarea[name="comment"]').value = '';
}


// Optional: Close the comment popup when clicking outside of it
window.onclick = function(event) {
    var popup = document.getElementById("commentPopup");
    if (event.target == popup) {
        toggleCommentPopup();
    }
}
