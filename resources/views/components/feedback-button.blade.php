<!-- Feedback Button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal">
    Leave Feedback
</button>

<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Leave Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="feedbackForm">
                    <div class="form-group">
                        <label for="identifier">Email (Optional)</label>
                        <input type="text" class="form-control" id="identifier" placeholder="Email (Optional)">
                    </div>
                    <div class="form-group">
                        <label for="feedbackType">Feedback Type</label>
                        <select class="form-control" id="feedbackType">
                            <option value="comment">Comment</option>
                            <option value="issue">Issue</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitFeedback()">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Function to Handle Form Submission -->
<script>
    function submitFeedback() {
        const identifier = document.getElementById('identifier').value || '{{ request()->ip() }}';
        const feedbackType = document.getElementById('feedbackType').value;
        const message = document.getElementById('message').value;

        fetch('/feedback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ identifier, type: feedbackType, message }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            $('#feedbackModal').modal('hide');
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>
