"use client";

import { Card } from "react-bootstrap";
import Image from "next/image"; 

const CourseInstructor = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-4">Course Instructor</h3>

          <div className="d-flex align-items-center mb-4">
            <div className="flex-shrink-0">
              <Image
                src="/images/user-69.jpg"
                className="wh-100 rounded-circle"
                alt="user"
                width={100}
                height={100}
              />
            </div>
            <div className="flex-grow-1 ms-3">
              <h4 className="fs-17 fw-medium mb-1">Aliva Cohen</h4>
              <span>aliva@trezo.com</span>
            </div>
          </div>

          <span className="d-block fw-medium mb-2 text-secondary">
            Course Description
          </span>
          <p className="mb-4">
            This course is designed for beginners who want to learn the
            fundamentals of the Python programming language. The course covers
            basic syntax, data types, control structures, and an introduction to
            object-oriented programming. Participants will have hands-on coding
            exercises to reinforce their learning.
          </p>

          <span className="d-block fw-medium mb-2 text-secondary">
            Course Description
          </span>
          <span className="d-block">Start Date: August 01, 2024</span>
          <span className="d-block mb-4">End Date: December 30, 2024</span>

          <span className="d-block fw-medium mb-2 text-secondary">Status</span>
          <p>
            The course is currently in progress. Students are actively engaged
            in the learning materials, and the instructor is providing guidance
            and support.
          </p>
        </Card.Body>
      </Card>
    </>
  );
};

export default CourseInstructor;
