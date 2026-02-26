"use client";

import { Card, ProgressBar } from "react-bootstrap";

const Contextual = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Contextual</h4>
          
          <ProgressBar variant="success" now={40} />
          <br/>
          <ProgressBar variant="info" now={20} />
          <br/>
          <ProgressBar variant="warning" now={60} />
          <br/>
          <ProgressBar variant="danger" now={80} />
        </Card.Body>
      </Card>
    </>
  )
}

export default Contextual;