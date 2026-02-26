"use client";

import { Card, Dropdown, Row, Col, Table, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import { useState, useEffect } from "react";

const AgentsPerformanceOverview = () => {
  const [data, setData] = useState([]);
  const [topAgent, setTopAgent] = useState(null);
  const [timeRange, setTimeRange] = useState("Last Month");

  // Simulate fetching data
  useEffect(() => {
    const fetchData = async () => {
      const agentsData = [
        {
          id: 1,
          name: "John Smith",
          calls: 380,
          avgCallDuration: "3 mins 45 secs",
          fcr: 92,
          csat: 92,
          status: "success",
          image: "/images/user-106.jpg",
        },
        {
          id: 2,
          name: "Sarah Davis",
          calls: 65,
          avgCallDuration: "4 mins 10 secs",
          fcr: 85,
          csat: 90,
          status: "success",
          image: "/images/user-107.jpg",
        },
        {
          id: 3,
          name: "Michael Brown",
          calls: 58,
          avgCallDuration: "5 mins 20 secs",
          fcr: 82,
          csat: 87,
          status: "danger",
          image: "/images/user-108.jpg",
        },
        {
          id: 4,
          name: "Emily Johnson",
          calls: 72,
          avgCallDuration: "4 mins 30 secs",
          fcr: 88,
          csat: 90,
          status: "success",
          image: "/images/user-109.jpg",
        },
        {
          id: 5,
          name: "David Lee",
          calls: 53,
          avgCallDuration: "3 mins 50 secs",
          fcr: 80,
          csat: 85,
          status: "danger",
          image: "/images/user-110.jpg",
        },
      ];

      setData(agentsData);

      // Determine the top-performing agent
      const topAgent = agentsData.reduce((prev, current) =>
        prev.csat > current.csat ? prev : current
      );
      setTopAgent(topAgent);
    };

    fetchData();
  }, [timeRange]);

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-start mb-3">
            <h3 className="mb-0 fw-semibold">Agents Performance Overview</h3>

            <Dropdown className="action-opt" align="end">
              <Dropdown.Toggle
                variant="link"
                className="text-decoration-none bg-transparent p-0 d-flex align-items-center text-body"
                id="dropdown-basic"
              >
                <span className="fs-14 lh-1">{timeRange}</span>{" "}
                <i className="ri-arrow-down-s-line fs-20"></i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                {["Last Day", "Last Week", "Last Month", "Last Year"].map(
                  (range) => (
                    <Dropdown.Item
                      key={range}
                      className="px-3 py-2 text-start"
                      onClick={() => setTimeRange(range)}
                    >
                      {range}
                    </Dropdown.Item>
                  )
                )}
              </Dropdown.Menu>
            </Dropdown>
          </div>

          {topAgent && (
            <Row className="mb-3">
              <Col lg={12}>
                <span className="d-block mb-2">Top Performing Agent</span>
              </Col>

              <Col sm={4}>
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0 position-relative">
                    <Image
                      src={topAgent.image}
                      className="rounded-2"
                      alt={topAgent.name}
                      width={40}
                      height={40}
                    />
                    <span
                      className={`bg-${topAgent.status} rounded-circle d-inline-block position-absolute top-50 start-100 translate-middle`}
                      style={{ width: "8px", height: "8px" }}
                    ></span>
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h4 className="fs-14 fw-semibold mb-1">{topAgent.name}</h4>
                    <span className="text-body">{topAgent.calls} Calls</span>
                  </div>
                </div>
              </Col>

              <Col sm={8} className="mt-2 mt-sm-0">
                <div className="d-flex justify-content-between align-items-center mb-2">
                  <span>Customer Satisfaction (CSAT)</span>
                  <span>{topAgent.csat}%</span>
                </div>

                <ProgressBar
                  variant={topAgent.status}
                  now={topAgent.csat}
                  style={{ height: "6px" }}
                />
              </Col>
            </Row>
          )}

          <div className="default-table-area style-three agents-performance-overview">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <tbody>
                  {data.map((agent) => (
                    <tr key={agent.id}>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0 position-relative">
                            <Image
                              src={agent.image}
                              className="rounded-2"
                              alt={agent.name}
                              width={40}
                              height={40}
                            />
                            <span
                              className={`bg-${agent.status} rounded-circle d-inline-block position-absolute top-50 start-100 translate-middle`}
                              style={{ width: "8px", height: "8px" }}
                            ></span>
                          </div>
                          <div className="flex-grow-1 ms-3">
                            <h4 className="fs-14 fw-medium mb-1">
                              {agent.name}
                            </h4>
                            <span className="text-body">
                              {agent.calls} Calls
                            </span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span className="text-body">Avg. Call Duration</span>
                        <span className="fw-medium d-block">
                          {agent.avgCallDuration}
                        </span>
                      </td>
                      <td>
                        <span className="text-body">FCR</span>
                        <span className="fw-medium d-block">{agent.fcr}%</span>
                      </td>
                      <td>
                        <span className="text-body">CSAT</span>
                        <span className="fw-medium d-block">{agent.csat}%</span>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default AgentsPerformanceOverview;
