"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";
import Image from "next/image";

const EmployeeSalary = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Employee Salary",
      data: [70, 60, 80, 100, 70, 40, 80],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#E9D5FF"],
    plotOptions: {
      bar: {
        columnWidth: "40%",
        borderRadius: 4,
      },
    },
    fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
        inverseColors: false,
        shade: "light",
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100],
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 0,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: false,
      tickAmount: 4,
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    tooltip: {
      y: {
        formatter: (val) => {
          return "$" + val + "K";
        },
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: "diamond",
      },
    },
    states: {
      hover: {
        filter: {
          type: "darken",
          value: 0.1,
        },
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <div className="custom-padding-30">
          <div
            className="d-flex justify-content-between align-items-center flex-wrap gap-3"
            style={{ paddingBottom: "30px" }}
          >
            <h3 className="mb-0">Employee Salary</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0 ms-e-10"
              >
                <i className="material-symbols-outlined">more_vert</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">schedule</i> Today
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">pie_chart</i> Last 7
                  Days
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">refresh</i> Last
                  Month
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">calendar_today</i>{" "}
                  Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">bar_chart</i> All
                  Time
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">visibility</i> View
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">delete</i> Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div className="d-flex align-items-center mb-4 mb-md-5">
            <div className="flex-shrink-0">
              <div
                className="bg-primary-50 bg-opacity-10 text-center rounded-1"
                style={{ width: "42px", height: "42px", lineHeight: "42px" }}
              >
                <Image
                  src="/images/icon-total-payroll.svg"
                  alt="icon-total-payroll"
                  width={26}
                  height={26}
                />
              </div>
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="d-block mb-1">Total Payroll</span>
              <h3 className="mb-0 fs-20 fw-semibold">$450,000</h3>
            </div>
          </div>

          <div style={{ margin: "-30px -10px -26px -12px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={255}
              />
            )}
          </div>

          <div className="d-flex flex-wrap gap-2 gap-xxl-4 mt-md-5 mt-3">
            <div className="d-flex align-items-center">
              <div className="flex-shrink-0">
                <div
                  className="bg-success-60 bg-opacity-10 text-center rounded-1"
                  style={{ width: "42px", height: "42px", lineHeight: "37px" }}
                >
                  <Image
                    src="/images/icon-salary-paid.svg"
                    alt="icon-salary-paid"
                    width={26}
                    height={26}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-3">
                <span className="d-block mb-1">Salary Paid</span>
                <h3 className="fs-20 fw-semibold">$395k</h3>
              </div>
            </div>

            <div className="d-flex align-items-center">
              <div className="flex-shrink-0">
                <div
                  className="bg-danger-50 bg-opacity-10 text-center rounded-1"
                  style={{ width: "42px", height: "42px", lineHeight: "42px" }}
                >
                  <Image
                    src="/images/icon-salary-pending.svg"
                    alt="icon-salary-paid"
                    width={26}
                    height={26}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-3">
                <span className="d-block mb-1">Salary Pending</span>
                <h3 className="fs-20 fw-semibold">$60k</h3>
              </div>
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default EmployeeSalary;
