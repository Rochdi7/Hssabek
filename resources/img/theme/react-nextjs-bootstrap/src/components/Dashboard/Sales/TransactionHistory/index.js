"use client";

import { Dropdown, Card } from "react-bootstrap";

const TransactionHistory = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Transaction History</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined fs-22">
                  more_horiz
                </span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">This Day</Dropdown.Item>

                <Dropdown.Item href="#">This Week</Dropdown.Item>

                <Dropdown.Item href="#">This Month</Dropdown.Item>

                <Dropdown.Item href="#">This Year</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <ul className="ps-0 mb-0 list-unstyled">
            <li className="d-flex align-items-center justify-content-between mb-3 pb-3">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined fs-24 icon-circle bg-primary bg-opacity-10 text-primary text-center rounded-circle wh-40 lh-40">
                    credit_card
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Master Card</h6>
                  <span className="fs-12">23 Dec 2024 - 3:20 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-success">+1,520</span>
            </li>

            <li className="d-flex align-items-center justify-content-between mb-3 pb-3">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined fs-24 icon-circle bg-danger bg-opacity-10 text-danger text-center rounded-circle wh-40 lh-40">
                    redeem
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Paypal</h6>
                  <span className="fs-12">23 Dec 2024 - 3:20 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-danger">-2,250</span>
            </li>

            <li className="d-flex align-items-center justify-content-between mb-3 pb-3">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined fs-24 icon-circle bg-primary-div bg-opacity-10 text-primary-div text-center rounded-circle wh-40 lh-40">
                    account_balance
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Wise</h6>
                  <span className="fs-12">23 Dec 2024 - 3:20 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-success">+3,560</span>
            </li>

            <li className="d-flex align-items-center justify-content-between mb-3 pb-3">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined fs-24 icon-circle bg-info bg-opacity-10 text-info text-center rounded-circle wh-40 lh-40">
                    currency_ruble
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Payoneer</h6>
                  <span className="fs-12">23 Dec 2024 - 3:20 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-success">+6,500</span>
            </li>

            <li className="d-flex align-items-center justify-content-between mb-3 pb-3">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined fs-24 icon-circle icon-circle bg-success bg-opacity-10 text-success text-center rounded-circle wh-40 lh-40">
                    credit_score
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Credit Card</h6>
                  <span className="fs-12">23 Dec 2024 - 3:20 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-danger">+4,320</span>
            </li>

            <li className="d-flex align-items-center justify-content-between mb-3 pb-3">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined fs-24 icon-circle bg-primary-div bg-opacity-10 text-primary-div text-center rounded-circle wh-40 lh-40">
                    account_balance
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Wise</h6>
                  <span className="fs-12">16 Dec 2024 - 1:23 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-success">+5,432</span>
            </li>

            <li className="d-flex align-items-center justify-content-between">
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined icon-circle bg-danger bg-opacity-10 text-danger text-center rounded-circle wh-40 lh-40">
                    redeem
                  </span>
                </div>
                <div className="flex-grow-1">
                  <h6 className="fw-medium fs16 mb-0">Paypal</h6>
                  <span className="fs-12">23 Dec 2024 - 3:20 pm</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-success">+1,820</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default TransactionHistory;
