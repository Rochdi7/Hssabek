"use client";

import { Row, Col, Card } from "react-bootstrap";
import DatePicker from './DatePicker';
import TimePicker from './TimePicker';

const Picker = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Picker</h4>
          
          <Row>
            <Col lg={6}>
              <DatePicker />
            </Col>

            <Col lg={6}>
              <TimePicker />
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  )
}

export default Picker;