"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card, ProgressBar} from "react-bootstrap";

const AnalyticsOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "New users",
      data: [28, 50, 90, 95, 20, 70, 35]
    },
    {
      name: "Page Views",
      data: [80, 60, 70, 30, 45, 20, 80]
    },
    {
      name: "Page Sessions",
      data: [32, 23, 78, 35, 65, 35, 15]
    },
    {
      name: "Bounce Rate",
      data: [60, 25, 80, 25, 15, 40, 15]
    }
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: [
      "#605DFF", "#AD63F6", "#3584FC", "#FD5812"
    ],
    plotOptions: {
      bar: {
        columnWidth: "65%",
        borderRadius: 4
      }
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2"
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 3,
      show: true,
      colors: ["transparent"]
    },
    xaxis: {
      categories: [
        "Mon",
        "Tue",
        "Wed",
        "Thu",
        "Fri",
        "Sat",
        "Sun"
      ],
      axisTicks: {
        show: false,
        color: '#ECEEF2'
      },
      axisBorder: {
        show: false,
        color: '#ECEEF2'
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px"
        }
      }
    },
    yaxis: {
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px"
        }
      },
      axisBorder: {
        show: false,
        color: '#ECEEF2'
      },
      axisTicks: {
        show: false,
        color: '#ECEEF2'
      }
    },
    legend: {
      show: false,
      position: 'top',
      fontSize: '12px',
      horizontalAlign: 'left',
      itemMargin: {
        horizontal: 8,
        vertical: 0
      },
      labels: {
        colors: '#64748B'
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -.5,
        shape: 'diamond'
      }
    },
  };

  return (
    <>
      <Card className="border-0 p-4 bg-white rounded-3 mb-4">
        <div className="d-flex flex-wrap gap-2 justify-content-between mb-30 pb-lg-2">
          <div>
            <h3 className="mb-1">Analytics Overview</h3>
            <span>Track, Analyze, and Optimize Performance</span>
          </div>

          <div>
            <ul className="analytics-tabs d-flex list-unstyled ps-0 mb-0">
              <li>
                <button>Day</button>
              </li>
              <li>
                <button className="active">Week</button>
              </li>
              <li>
                <button>Month</button>
              </li>
            </ul>
          </div>
        </div>

        <Row className="align-items-end">
          <Col md={7} lg={8}>
            <div className="me-plus-27 mb-4 mb-md-0">
              <div style={{ margin: '-23px -9px -27px -17px' }}>
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="bar"
                    height={374}
                  />
                )}
              </div>
            </div>
          </Col>

          <Col md={5} lg={4}>
            <div className="ms-minus-27">
              <div className="mb-4">
                <div className="d-flex justify-content-between mb-2 pb-1">
                  <div>
                    <span className="fs-12 d-block mb-1 text-secondary">
                      New Users
                    </span>
                    <h4 className="fs-16 mb-0">19.5k</h4>
                  </div>
                  <div className="text-end">
                    <span className="fs-12 d-block mb-1">Goal Reached</span>
                    <h4 className="fs-16 mb-0 text-body">75%</h4>
                  </div>
                </div>

                <ProgressBar 
                  variant="primary" 
                  now={75} 
                  style={{
                    height: '4px',
                    borderRadius: '30px'
                  }}
                />
              </div>

              <div className="mb-4">
                <div className="d-flex justify-content-between mb-2 pb-1">
                  <div>
                    <span className="fs-12 d-block mb-1 text-secondary">
                      Page Views
                    </span>
                    <h4 className="fs-16 mb-0">48k</h4>
                  </div>
                  <div className="text-end">
                    <span className="fs-12 d-block mb-1">Goal Reached</span>
                    <h4 className="fs-16 mb-0 text-body">45%</h4>
                  </div>
                </div>

                <ProgressBar 
                  variant="info" 
                  now={45} 
                  style={{
                    height: '4px',
                    borderRadius: '30px'
                  }}
                />
              </div>

              <div className="mb-4">
                <div className="d-flex justify-content-between mb-2 pb-1">
                  <div>
                    <span className="fs-12 d-block mb-1 text-secondary">
                      Page Sessions
                    </span>
                    <h4 className="fs-16 mb-0">33.3k</h4>
                  </div>
                  <div className="text-end">
                    <span className="fs-12 d-block mb-1">Goal Reached</span>
                    <h4 className="fs-16 mb-0 text-body">55%</h4>
                  </div>
                </div>

                <ProgressBar 
                  variant="success" 
                  now={55} 
                  style={{
                    height: '4px',
                    borderRadius: '30px'
                  }}
                />
              </div>

              <div className="mb-4">
                <div className="d-flex justify-content-between mb-2 pb-1">
                  <div>
                    <span className="fs-12 d-block mb-1 text-secondary">
                      Bounce Rate
                    </span>
                    <h4 className="fs-16 mb-0">22.45%</h4>
                  </div>
                  <div className="text-end">
                    <span className="fs-12 d-block mb-1">Goal Reached</span>
                    <h4 className="fs-16 mb-0 text-body">35%</h4>
                  </div>
                </div>

                <ProgressBar 
                  variant="danger" 
                  now={30} 
                  style={{
                    height: '4px',
                    borderRadius: '30px'
                  }}
                />
              </div>
            </div>
          </Col>
        </Row>
      </Card> 
    </>
  );
};

export default AnalyticsOverview;
