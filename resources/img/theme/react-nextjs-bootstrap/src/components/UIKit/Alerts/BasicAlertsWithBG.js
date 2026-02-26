"use client";

import { Card, Alert } from "react-bootstrap";

const BasicAlertsWithBG = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Basic Alerts With BG</h4>

          <div>
            <Alert variant="primary" className='bg-primary text-white'>This is a primary alert—check it out!</Alert>

            <Alert variant="secondary" className='bg-secondary text-white'>This is a secondary alert—check it out!</Alert>

            <Alert variant="success" className='bg-success text-white'>This is a success alert—check it out!</Alert>

            <Alert variant="danger" className='bg-danger text-white'>This is a danger alert—check it out!</Alert>

            <Alert variant="warning" className='bg-warning text-white'>This is a warning alert—check it out!</Alert>

            <Alert variant="info" className='bg-info text-white'>This is an info alert—check it out!</Alert>

            <Alert variant="light" className='bg-light text-dark'>This is a light alert—check it out!</Alert>

            <Alert variant="dark" className='bg-dark text-white'>This is a dark alert—check it out!</Alert>
          </div>
        </Card.Body>
      </Card>
    </>
  )
}

export default BasicAlertsWithBG;