"use client";

import { Card, Alert } from "react-bootstrap";

const BasicAlerts = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Basic Alerts</h4>

          <div>
            <Alert variant="primary">This is a primary alert—check it out!</Alert>

            <Alert variant="secondary">This is a secondary alert—check it out!</Alert>

            <Alert variant="success">This is a success alert—check it out!</Alert>

            <Alert variant="danger">This is a danger alert—check it out!</Alert>

            <Alert variant="warning">This is a warning alert—check it out!</Alert>

            <Alert variant="info">This is an info alert—check it out!</Alert>

            <Alert variant="light">This is a light alert—check it out!</Alert>

            <Alert variant="dark">This is a dark alert—check it out!</Alert>
          </div>
        </Card.Body>
      </Card>
    </>
  )
}

export default BasicAlerts;