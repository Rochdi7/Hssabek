"use client";

import React, { useState } from "react";
import { Row, Col, Form } from "react-bootstrap";

const BudgetEstimates = () => {
  const [dailyBudget, setDailyBudget] = useState(1000); // Default budget set to 1000

  return (
    <div
      className="campaign-stepper-content m-auto"
      style={{ maxWidth: "625px" }}
    >
      <Form>
        <h3 className="fs-18 mb-4">Budget Estimates</h3>

        <div className="mb-5">
          <label className="fw-semibold mb-3">Budgets Estimates</label>
          <Row>
            <Col sm={6} className="mb-3 mb-sm-0">
              <label htmlFor="radio4" className="custom-radio">
                <input
                  type="radio"
                  className="form-check-input"
                  name="radio"
                  id="radio4"
                  defaultChecked
                />
                <div className="radio-content">
                  <span className="fw-medium text-secondary mb-1 d-block">
                    Continuous Duration
                  </span>
                  <p>Your Ad will run continuously for a daily budget.</p>
                </div>
              </label>
            </Col>

            <Col>
              <label htmlFor="radio10" className="custom-radio">
                <input
                  type="radio"
                  className="form-check-input"
                  name="radio"
                  id="radio10"
                />
                <div className="radio-content">
                  <span className="fw-medium text-secondary mb-1 d-block">
                    Fixed Duration
                  </span>
                  <p>Your Ad will run only on specified dates.</p>
                </div>
              </label>
            </Col>
          </Row>
        </div>

        {/* Dynamic Daily Budget Section */}
        <div className="mb-5">
          <label className="fw-semibold mb-3">Daily Budget</label>
          <div>
            <Form.Range
              min={100}
              max={10000}
              step={100}
              value={dailyBudget}
              onChange={(e) => setDailyBudget(e.target.value)}
            />
            <div className="text-center mt-2">
              Selected Daily Budget: <strong>${dailyBudget}</strong>
            </div>
          </div>
        </div>
      </Form>
    </div>
  );
};

export default BudgetEstimates;
