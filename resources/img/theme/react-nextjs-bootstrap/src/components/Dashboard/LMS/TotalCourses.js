"use client";

import { Card } from "react-bootstrap";

const TotalCourses = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <span>Total Courses</span>

          <h3 className="mb-0 fs-20">45.6k</h3>

          <div className="py-3">
            <div className="wh-77 lh-97 text-center m-auto bg-primary bg-opacity-25 rounded-circle">
              <span className="material-symbols-outlined fs-32 text-primary">
                auto_stories
              </span>
            </div>
          </div>

          <div className="d-flex justify-content-between align-items-center">
            <span className="fs-12">This Month</span>
            <span className="material-symbols-outlined fs-24 text-success">
              timeline
            </span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalCourses;
