"use client";

import { Dropdown, Card } from "react-bootstrap";
import Image from "next/image";

const TotalTransactions = () => {
  return (
    <>
      <Card
        className="custom-shadow for-dark-rounded-bg rounded-3 border mb-4"
        style={{
          background: "linear-gradient(103deg, #9135E8 9.27%, #BF85FB 83.62%)",
        }}
      >
        <div
          className="d-flex justify-content-between align-items-center flex-wrap gap-3"
          style={{
            padding: "12.5px 25px",
          }}
        >
          <h3 className="mb-0 fs-16 fw-normal text-white">
            Total Transactions
          </h3>

          <Dropdown className="action-opt -right-10">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="btn bg-transparent p-0 text-end"
              style={{ fontSize: "inherit" }}
            >
              <i
                className="material-symbols-outlined text-white"
                style={{ fontSize: "20px" }}
              >
                more_vert
              </i>
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">schedule</i>
                Today
              </Dropdown.Item>

              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">pie_chart</i>
                Last 7 Days
              </Dropdown.Item>

              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">refresh</i>
                Last Month
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <Card.Body className="bg-white p-4 rounded-2">
          <div className="d-flex align-items-center justify-content-between mb-3">
            <h3 className="fs-24 fw-semibold text-secondary mb-0">1200</h3>
            <div
              className="text-center rounded-circle"
              style={{
                backgroundColor: "#F3E8FF",
                width: "51px",
                height: "51px",
                lineHeight: "51px",
              }}
            >
              <Image
                src="/images/total-transactions-icon.svg"
                alt="total-transactions-icon"
                width={26}
                height={26}
              />
            </div>
          </div>
          <div className="d-flex align-items-center">
            <span className="material-symbols-outlined fs-20 text-success-60 me-2">
              trending_up
            </span>
            <span>
              <span className="fw-semibold">+10%</span> from last month
            </span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalTransactions;
