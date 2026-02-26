"use client";

import { Card, Alert } from "react-bootstrap";

const OutlineAlerts = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Outline Alerts</h4>

          <div>
            <Alert variant="primary" className="bg-transparent text-primary">
              This is a primary alert—check it out!
            </Alert>

            <Alert
              variant="secondary"
              className="bg-transparent text-secondary"
            >
              This is a secondary alert—check it out!
            </Alert>

            <Alert variant="success" className="bg-transparent text-success">
              This is a success alert—check it out!
            </Alert>

            <Alert variant="danger" className="bg-transparent text-danger">
              This is a danger alert—check it out!
            </Alert>

            <Alert variant="warning" className="bg-transparent text-warning">
              This is a warning alert—check it out!
            </Alert>

            <Alert variant="info" className="bg-transparent text-info">
              This is an info alert—check it out!
            </Alert>

            <Alert variant="light" className="bg-transparent text-light">
              This is a light alert—check it out!
            </Alert>

            <Alert variant="dark" className="bg-transparent text-dark">
              This is a dark alert—check it out!
            </Alert>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OutlineAlerts;
