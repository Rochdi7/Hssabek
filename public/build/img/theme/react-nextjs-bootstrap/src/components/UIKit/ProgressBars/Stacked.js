"use client";

import { Card, ProgressBar } from "react-bootstrap";

const Stacked = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Stacked</h4>
          
          <ProgressBar>
            <ProgressBar striped variant="success" now={35} key={1} />
            <ProgressBar variant="warning" now={20} key={2} />
            <ProgressBar striped variant="danger" now={10} key={3} />
          </ProgressBar>
        </Card.Body>
      </Card>
    </>
  )
}

export default Stacked;