"use client";

import { Card, ProgressBar } from "react-bootstrap";

const BasicProgressBars = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Basic Progress Bars</h4>
          
          <ProgressBar now={60} />
        </Card.Body>
      </Card>
    </>
  )
}

export default BasicProgressBars;