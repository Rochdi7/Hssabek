"use client";

import { Row, Col } from "react-bootstrap"; 

const SchoolOverview = () => {
  // Get the current date and format it
  const today = new Date();
  const formattedDate = today.toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });

  return (
    <>
      <Row className="align-items-center">
        <Col md={7}>
          <div className="mb-3 mb-md-4">
            <h3 className="fs-20 fw-semibold mb-1">
              School Overview Dashboard
            </h3>
            <p style={{ lineHeight: 1.4 }}>
              Manage Students, Teachers, and School Data Seamlessly!
            </p>
          </div>
        </Col>

        <Col md={5} className="text-md-end mb-4">
          <div
            className="d-inline-block rounded-1"
            style={{
              border: "1px solid #DDE4FF",
              backgroundColor: "#ECF0FF",
              padding: "1px 10px",
            }}
          >
            <i className="ri-calendar-line text-primary"></i>
            <span className="text-primary ms-1">
              Today - {formattedDate}
            </span>
          </div>
        </Col>
      </Row>
    </>
  );
};

export default SchoolOverview;
