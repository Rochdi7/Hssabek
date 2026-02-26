"use client";

import { Card, Alert } from "react-bootstrap";

const AlertsWithIcon = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Alerts With Icon</h4>

          <div>
            <Alert variant="primary" className="text-primary">
              <i className="ri-home-7-line fs-18 me-1"></i> This is a primary
              alert—check it out!
            </Alert>

            <Alert variant="secondary" className="text-secondary">
              <i className="ri-star-line fs-18 me-1"></i>
              This is a secondary alert—check it out!
            </Alert>

            <Alert variant="success" className="text-success">
              <i className="ri-play-circle-line fs-18 me-1"></i>
              This is a success alert—check it out!
            </Alert>

            <Alert variant="danger" className="text-danger">
              <i className="ri-service-line fs-18 me-1"></i> This is a danger
              alert—check it out!
            </Alert>

            <Alert variant="warning" className="text-warning">
              <i className="ri-edit-box-line fs-18 me-1"></i> This is a warning
              alert—check it out!
            </Alert>

            <Alert variant="info" className="text-info">
              <i className="ri-table-line fs-18 me-1"></i> This is an info
              alert—check it out!
            </Alert>

            <Alert variant="light" className="text-light">
              <i className="ri-code-s-slash-fill fs-18 me-1"></i> This is a light
              alert—check it out!
            </Alert>

            <Alert variant="dark" className="text-dark">
              <i className="ri-html5-line fs-18 me-1"></i> This is a dark
              alert—check it out!
            </Alert>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AlertsWithIcon;
