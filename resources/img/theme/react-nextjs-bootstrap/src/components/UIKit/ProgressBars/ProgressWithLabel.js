"use client";

import { Card, ProgressBar } from "react-bootstrap";

function ProgressWithLabel() {
  const now = 60;

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Progress With Label</h4>
          
          <ProgressBar now={now} label={`${now}%`} />
        </Card.Body>
      </Card>
    </>
  )
}

export default ProgressWithLabel;