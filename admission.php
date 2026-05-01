<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form | Al-Noor Quran Academy</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: #f1f5f9;">

    <header>
        <div class="logo">
            <i class="fa-solid fa-mosque"></i>
            <span>AL-NOOR ACADEMY</span>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <div class="admission-container">
        <h2 style="text-align: center; margin-bottom: 30px; color: var(--primary-dark); font-family: 'Amiri', serif; font-size: 2.5rem;">Join the Academy</h2>
        <p style="text-align: center; margin-bottom: 40px; color: var(--text-muted);">Please fill out the form below to register for a free trial class.</p>
        
        <?php if(isset($_GET['success'])): ?>
            <div style="background: #dcfce7; color: #166534; padding: 20px; border-radius: 12px; margin-bottom: 30px; text-align: center; font-weight: 600;">
                <i class="fa-solid fa-check-circle"></i> JazakAllah! Your application has been submitted successfully. We will contact you soon.
            </div>
        <?php endif; ?>

        <form action="process_admission.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number (WhatsApp)</label>
                <input type="tel" id="phone" name="phone" placeholder="+1 234 567 890" required>
            </div>

            <div class="form-group">
                <label for="course">Interested Course</label>
                <select id="course" name="course" required>
                    <option value="" disabled selected>Select a course</option>
                    <option value="Noorani Qaida">Noorani Qaida</option>
                    <option value="Tajweed-ul-Quran">Tajweed-ul-Quran</option>
                    <option value="Hifz-ul-Quran">Hifz-ul-Quran</option>
                    <option value="Islamic Studies">Islamic Studies</option>
                    <option value="Arabic Language">Arabic Language</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message (Optional)</label>
                <textarea id="message" name="message" rows="4" placeholder="Any specific requirements or questions?"></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit Application</button>
        </form>
    </div>

    <footer style="margin-top: 100px;">
        <p>&copy; 2026 Al-Noor Quran Academy. All rights reserved.</p>
    </footer>

</body>
</html>
