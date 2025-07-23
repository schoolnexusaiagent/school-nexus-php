CREATE TABLE fees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    school_id INT NOT NULL,
    student_id INT NOT NULL,
    class_id INT NOT NULL,
    fee_type VARCHAR(100) NOT NULL,
    total_amount DECIMAL(12,2) NOT NULL,
    due_date DATE NOT NULL,
    status ENUM('paid', 'partial', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
);